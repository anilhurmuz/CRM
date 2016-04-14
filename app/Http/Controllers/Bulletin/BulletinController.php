<?php namespace App\Http\Controllers\Bulletin;

use App\Bulletin;
use App\Bulletin_List;
use App\Document;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

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
		$input = $request->all();
		$type = $input['type'];
		if($type=='document') {
			$url = $input['url2'];
			$request->request->add(['url'=>$url]);
			$input = $request->all();
			$affected = Document::create($input);
			$id = $affected->getAttribute('id');
			$request->request->add(['documentid'=>$id]);
			$input = $request->all();
			Bulletin::create($input);
		} else if($type=='text') {
			$affected = Document::create($input);
			$id = $affected->getAttribute('id');
			$request->request->add(['documentid'=>$id]);
			$input = $request->all();
			Bulletin::create($input);
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
		//Update Name, Date, Type Fields
		Bulletin::where('id','=',$input['id'])->update(['name'=>$input['name'], 'todate'=>$input['todate']]);
		$bulletin = Bulletin::where('id','=',$input['id'])->first();
		Document::where('id','=',$bulletin->documentid)->update(['type'=>$input['type']]);
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
					$user = DB::table('info')->where('parentid',$contact)->first();
					$request->request->add(['bulletinid'=>$input['id'], 'parenttype'=>$user->parenttype, 'parentid'=>$contact]);
					$input = $request->all();
					Bulletin_List::create($input);
					//Notification
					$userName = DB::table('contacts')->where('id', $contact)->first();
					$getAccountId = Accounts_Contacts::where('contactid','=',$userName->id)->first();
					$firmName = Account::where('id','=',$getAccountId->accountid)->first();
					DB::table('messages')->insert(
						['fromsys' => 'user_module', 'tosys' => 'user_module', 'fromdetail' => $firmName->name, 'todetail' => $userName->name, 'actiondate' => $input["todate"],
							'status' => '0', 'datamessage' => 'This is test data.', 'application' => '1', 'company' => '2']
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
