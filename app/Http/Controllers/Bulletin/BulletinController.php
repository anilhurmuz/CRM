<?php namespace App\Http\Controllers\Bulletin;

use App\Bulletin;
use App\Bulletin_List;
use App\Document;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Redirect;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BulletinController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //sql for listele.blade and specific tabs
        $sqlForList = "select DISTINCT b.id, b.name, b.startdate, b.description, b.enddate, b.type, count(d.parentid) 'numofdocument' from bulletins b
        left outer join document d on b.id=d.parentid where d.deleted_at is NULL and b.deleted_at is NULL GROUP BY b.name;";
        $recordsForList = DB::select($sqlForList);

        return view('pages.crm.ebulten_yonetimi.ebulten_yonetimi')
            ->with('mydata', json_encode($recordsForList));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create(Request $request)
    {
        //if bulletin name exist in database
        $input = $request->all();
        if (Bulletin::where('name', '=', $request->get('name'))->exists()) {
            return 1;
        } //create new row in bulletin database
        else {
            Bulletin::create($input);
        }
    }

    public function checkBulletinName(Request $request)
    {
        //check if bulletin name exist in database
        if (Bulletin::where('name', '=', $request->get('data'))->exists()) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Request $request)
    {
        //get bulletin id
        $id = $request->get('data');
        //get bulletin for specific tab
        $response = Bulletin::where('id', '=', $id)->first();
        //get contacts' names for bulletin list
        $sqlForAdd = "select id 'contactId', name, surname from contacts where bulletin='evet' and deleted_at is NULL";
        $recordsForAdd = DB::select($sqlForAdd);
        //get documents for datatable
        $sqlFromContactsForBulletin = "select id, name, type from document where parentid=$id and deleted_at is NULL";
        $recordsFromContactsForBulletin = DB::select($sqlFromContactsForBulletin);
        //get id from bulletin list for checkboxs
        $sqlForNonCheckBox = "select parentid from bulletin_list where bulletinid=$id and deleted_at is NULL";
        $recordsForCheckBox = DB::select($sqlForNonCheckBox);

        return view('pages.crm.ebulten_yonetimi.guncelle')
            ->with('data', $response)
            ->with('data2', json_encode($recordsForAdd))
            ->with('data3', json_encode($recordsFromContactsForBulletin))
            ->with('data4', json_encode($recordsForCheckBox))->with('bulletinId',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */

    public function addDocument(Request $request)
    {
        // getting all of the post data
        $file = array('document' => $request->file('url'));
        // setting up rules
        $rules = array('document' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return 1;
        } else {
            // checking file is valid.
            if ($request->file('url')->isValid()) {
                $destinationPath = 'uploads/' . $request->get('type'); // upload path
                $fileName = $request->file('url')->getClientOriginalName();  // renameing image
                $path = $request->file('url')->move($destinationPath, $fileName); // uploading file to given path
                // create Document Object
                $document = new Document;
                $document->name = $request->get('name');
                $document->type = $request->get('type');
                $document->url = $path->getRealPath();
                $document->parentid = $request->get('bulletinid');
                $document->xcmpcode = $request->get('xcmpcode');
                $document->save();
            } else {
                // sending back with error message.
                return 2;
            }
        }
        //send documents for specific bulletin and redraw datatable
        $id = $request->get('bulletinid');
        $documents = DB::select("select id,name,type from document where parentid=$id and deleted_at is NULL");
        return response()->json($documents);
    }

    public function update(Request $request)
    {
        //Get all inputs
        $input = $request->all();
        dd($input);
        //Update Bulletin Table
        Bulletin::where('id', '=', $input['id'])->update(['name' => $input['name'], 'description' => $input['description'], 'type' => $input['type'], 'startdate' => $input['startdate'], 'enddate' => $input['enddate']]);
        //Update if rows are not checked
        if ($request->get('contactId') == null) {
            $ids = Bulletin_List::where('bulletinid', '=', $input['id'])->get();
            foreach ($ids as $id) Bulletin_List::destroy($id->id);
        } //Update if rows are checked
        else {
            $contacts = $input['contactId'];
            foreach ($contacts as $contact) {
                $check = Bulletin_List::where('parentid', '=', $contact)->first();
                if ($check == null) {
                    $request->request->add(['bulletinid' => $input['id'], 'parenttype' => 'contact', 'parentid' => $contact]);
                    $input = $request->all();
                    Bulletin_List::create($input);
                    //Notification Part
                    $userName = DB::table('contacts')->where('id', $contact)->first();
                    $getAccountId = DB::table('accounts_contacts')->where('contactid', '=', $userName->id)->first();
                    $firmName = DB::table('accounts')->where('id', '=', $getAccountId->accountid)->first();
                    $specificBulletinId = $request->get('id');
                    $dataMessages = DB::select("select name, url from document where parentid=$specificBulletinId and deleted_at is NULL");
                    foreach($dataMessages as $dataMessage)
                    DB::table('messages')->insert(
                        ['fromsys' => 'user_module', 'tosys' => 'user_module', 'fromdetail' => $firmName->name, 'todetail' => $userName->name, 'startdate' => $input["startdate"],
                            'enddate' => $input["enddate"], 'status' => '0', 'datamessage' => ($dataMessage->name.' - '.$dataMessage->url), 'application' => '1', 'company' => '2']
                    );
                }
            }
            //Update if rows are not checked
            if ($request->get('uncheckcontactId') != null) {
                $uncheckedContacts = $input['uncheckcontactId'];
                foreach ($uncheckedContacts as $uncheckedContact) {
                    $uncheckUser = Bulletin_List::where('parentid', '=', $uncheckedContact)
                        ->select('id')->get()->first();
                    if ($uncheckUser != null) Bulletin_List::destroy($uncheckUser->id);
                }
            }
        }
        //sending json response for redraw datatables
        $id = $request->get('id');
        $sqlForAdd = "select id 'contactId', name, surname from contacts where bulletin='evet' and deleted_at is NULL";
        $sqlForCheckBox = "select parentid from bulletin_list where bulletinid=$id and deleted_at is NULL";
        $recordsForAdd = DB::select($sqlForAdd);
        $recordsForCheckBox = DB::select($sqlForCheckBox);

        return response()->json(array("data2" => $recordsForAdd, "data4" => $recordsForCheckBox));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */

    public function deleteDocument(Request $request)
    {
        //delete bulletins documents
        $id = $request->get('id');
        Document::destroy($id);
    }

    public function destroy(Request $request)
    {
        //delete bulletins
        $id = $request->get('id');
        Bulletin::destroy($id);
    }

}
