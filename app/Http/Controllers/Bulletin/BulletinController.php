<?php namespace App\Http\Controllers\Bulletin;

use App\Bulletin;
use App\Bulletin_List;
use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use Redirect;
use Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BulletinController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sqlForList = "select b.id, b.name, b.todate, d.type, d.url from bulletins b, document d where b.documentid=d.id and b.deleted_at is NULL;";
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
		 // getting all of the post data
		$file = array('document' => $request->file('url'));
		// setting up rules
		$rules = array('document' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
		 // doing the validation, passing post data, rules and the messages
		$validator = Validator::make($file, $rules);
		if($validator->fails()) {
			 // send back to the page with the input data and errors
			return redirect('crm/ebulten_yonetimi')->withInput()->withErrors($validator);
		} else {
			// checking file is valid.
			if($request->file('url')->isValid()) {

				$destinationPath = $request->get('type'); // upload path
				$fileName = $request->file('url')->getClientOriginalName();  // renameing image
				$path = $request->file('url')->move($destinationPath, $fileName); // uploading file to given path
				// create Document Object
				$document = new Document;
				$document->type = $request->get('type');
				$document->url = $path->getRealPath();
				$document->xcmpcode = $request->get('xcmpcode');
				$document->save();
				//create Bulletin Object
				$bulletin = new Bulletin;
				$bulletin->name = $request->get('name');
				$bulletin->todate = $request->get('todate');
				$bulletin->documentid = $document->id;
				$bulletin->xcmpcode = $request->get('xcmpcode');
				$bulletin->save();
			} else {
				 // sending back with error message.
				Session::flash('error', 'uploaded file is not valid!');
				return redirect('crm/ebulten_yonetimi');
			}
		}
		return redirect('crm/ebulten_yonetimi');
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request)
	{
		$id = $request->get('data');
		$response = Bulletin::where('id','=',$id)->first();
		$sqlForAdd = "select id 'contactId', name, surname from contacts where bulletin='evet' and deleted_at is NULL";
		$sqlFromContactsForBulletin = "select contacts.name, contacts.surname from contacts, bulletin_list where contacts.bulletin='evet' and bulletin_list.bulletinid = 6 and bulletin_list.deleted_at is NULL and contacts.deleted_at is NULL;";
		$sqlForCheckBox = "select parentid from bulletin_list where bulletinid=$id and deleted_at is NULL";
		$recordsForAdd = DB::select($sqlForAdd);
		$recordsFromContactsForBulletin = DB::select($sqlFromContactsForBulletin);
		$recordsForCheckBox = DB::select($sqlForCheckBox);
		return view('pages.crm.ebulten_yonetimi.guncelle')->with('data',$response)
			->with('data2', json_encode($recordsForAdd))
			->with('data3', json_encode($recordsFromContactsForBulletin))
			->with('data4', json_encode($recordsForCheckBox));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		//Get all inputs
		$input = $request->all();
		//file işlemleri
		if($request->file('url')!=null) {
			if($request->file('url')->isValid()) {
				$destinationPath = $request->get('type'); // upload path
				$fileName = $request->file('url')->getClientOriginalName();  // renameing image
				$path = $request->file('url')->move($destinationPath, $fileName); // uploading file to given path
				//Update Name, Date, Type Fields
				Bulletin::where('id','=',$input['id'])->update(['name'=>$input['name'], 'todate'=>$input['todate']]);
				$bulletin = Bulletin::where('id','=',$input['id'])->first();
				Document::where('id','=',$bulletin->documentid)->update(['type'=>$input['type'], 'url'=>$path->getRealPath()]);
			} else {
				Session::flash('error', 'uploaded file is not valid!');
				return redirect('crm/ebulten_yonetimi');
			}
		} else {
			//Update Name, Date, Type Fields
			Bulletin::where('id','=',$input['id'])->update(['name'=>$input['name'], 'todate'=>$input['todate']]);
			$bulletin = Bulletin::where('id','=',$input['id'])->first();
			Document::where('id','=',$bulletin->documentid)->update(['type'=>$input['type']]);
		}
		//Update if rows are not checked
		if($request->get('contactId') == null) {
			$ids = Bulletin_List::where('bulletinid','=',$input['id'])->get();
			foreach($ids as $id) Bulletin_List::destroy($id->id);
		}
		//Update if rows are checked
		else {
			$contacts = $input['contactId'];
			foreach ($contacts as $contact) {
				$check = Bulletin_List::where('parentid','=',$contact)
					->first();
				if ($check == null) {
					$request->request->add(['bulletinid'=>$input['id'], 'parenttype'=>'contact', 'parentid'=>$contact]);
					$input = $request->all();
					Bulletin_List::create($input);
					//Notification
					$userName = DB::table('contacts')->where('id', $contact)->first();
					$getAccountId = DB::table('accounts_contacts')->where('contactid','=',$userName->id)->first();
					$firmName = DB::table('accounts')->where('id','=',$getAccountId->accountid)->first();
					$documentid = DB::table('bulletins')->where('id','=',$input['id'])->first();
					$data = Document::where('id','=',$documentid->documentid)->first();
					DB::table('messages')->insert(
						['fromsys' => 'user_module', 'tosys' => 'user_module', 'fromdetail' => $firmName->name, 'todetail' => $userName->name, 'actiondate' => $input["todate"],
							'status' => '0', 'datamessage' => $data->url, 'application' => '1', 'company' => '2']
					);
				}
			}
			//Update if rows are not checked
			if($request->get('uncheckcontactId')!=null) {
			$uncheckedContacts = $input['uncheckcontactId'];
			foreach($uncheckedContacts as $uncheckedContact) {
				$uncheckUser = Bulletin_List::where('parentid','=',$uncheckedContact)
					->select('id')->get()->first();
				if($uncheckUser!=null) Bulletin_List::destroy($uncheckUser->id);
				}
			}
		}
		return redirect('crm/ebulten_yonetimi');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		$id = $request->get('id');
		Bulletin::destroy($id);
	}

}
