<?php namespace App\Http\Controllers\Contact;

use App\Account;
use App\Accounts_Contacts;
use App\Contact;
use App\Info;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Session;

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sql = "select c.id, c.name, c.surname, a.status, a.title, c.phone1, c.phone2, c.facebook, c.twitter, c.linkedin, c.description, c.bulletin, ac.name 'account', a.accountid 'accountid' from contacts c
		left outer join accounts_contacts a on a.contactid = c.id
		left outer join accounts ac on a.accountid = ac.id where c.deleted_at is NULL and a.id = (SELECT MAX(id) FROM accounts_contacts acs WHERE acs.contactid = c.id);";
		$record = DB::select($sql);

		$sqlForFirm = "select id, name from accounts";
		$firmNames = DB::select($sqlForFirm);
		return view('pages.crm.kisi_yonetimi.kisi_yonetimi')
			->with('mydata', json_encode($record))
			->with('firmNames', $firmNames);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create(Request $request)
	{
		$input = $request->all();
		$createdRow = Contact::create($input);
		$contactId = $createdRow->getAttribute('id');
		if($request->get('parentid')==null)
			$request->request->add(['contactid'=>$contactId, 'accountid'=>$input['account']]);
		else
			$request->request->add(['accountid'=>$input['parentid'], 'contactid'=>$contactId]);
		$input = $request->all();
		Accounts_Contacts::create($input);

		return redirect('crm/kisi_yonetimi');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function autocompleteName(Request $request) {

		$key = $request->get('term');
		$names = Contact::where('name','LIKE',$key.'%')->get();

		foreach($names as $name) {
			$res[] = array('value'=> $name->name);
		}

		return json_encode($res);
	}

	public function autocompleteSurname(Request $request) {
		$key = $request->get('term');
		$surnames = Contact::where('surname','LIKE',$key.'%')->get();

		foreach($surnames as $surname) {
			$res[] = array('value'=> $surname->surname);
		}

		return json_encode($res);
	}

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

	//Kişiler birden fazla şirkette çalışmış olabilir

	public function addContactFirm(Request $request) {
		$input = $request->all();
		$request->request->add(['accountid'=>$input['account']]);
		$input = $request->all();
		$affected = Accounts_Contacts::create($input);

		$id = $input['contactid'];

		$sql = "select c.id, a.name, c.title, c.contactid 'contact' from accounts a left outer join accounts_contacts c on c.accountid=a.id where c.contactid=$id;";
		$record = DB::select($sql);

		return response()->json($record);
	}

	public function edit(Request $request)
	{
		$id = $request->get('data');
		$reqtype = $request->get('frame');

		$sqlForSpecificContact = "select c.id, c.name, c.surname, c.description, c.phone1, c.phone2, c.facebook, c.twitter, c.linkedin, c.bulletin, a.accountid , a.status, a.title from contacts c left outer join accounts_contacts a on a.contactid=c.id where c.id=$id;";
		$response = DB::select($sqlForSpecificContact);

		$sql = "select c.id, a.name, c.title, c.contactid 'contact' from accounts a left outer join accounts_contacts c on c.accountid=a.id where c.contactid=$id;";
		$contactInfoFromDatabase = DB::select($sql);

		$sqlForFirm = "select id,name from accounts";
		$firmNames = DB::select($sqlForFirm);

		return view('pages.crm.kisi_yonetimi.guncelle')
			->with('data', $response)
			->with('contactInfo', json_encode($contactInfoFromDatabase))
			->with('firmNames', $firmNames)
			->with('contact', $id)->with('reqtype', $reqtype);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$input = $request->all();
		Contact::where('id','=',$input['id'])->update(['name'=>$input['name'], 'surname'=>$input['surname'], 'description'=>$input['description'], 'bulletin'=>$input['bulletin'], 'phone1'=>$input['phone1'], 'phone2'=>$input['phone2'], 'facebook'=>$input['facebook'], 'twitter'=>$input['twitter'], 'linkedin'=>$input['linkedin']]);

		return Response::create(['status'=>200]);
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
		Contact::destroy($id);
		$acIds = Accounts_Contacts::where('contactid','=',$id)->get();
		foreach($acIds as $acId) Accounts_Contacts::destroy($acId->id);
	}

}
