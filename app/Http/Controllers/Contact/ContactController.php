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

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sql = "select c.id,c.name, c.surname, a.status, a.title, a.xcmpcode, i.phone1, i.phone2 from contacts c
		left outer join accounts_contacts a on a.contactid = c.id and a.deleted_at is NULL
		left outer join info i on i.parentid=c.id and i.parenttype='contact' and i.deleted_at is NULL where c.deleted_at is NULL;";

		$record = DB::select($sql);

		return view('pages.crm.kisi_yonetimi.kisi_yonetimi')->with('mydata',json_encode($record));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create(Request $request)
	{
		$input = $request->all();
		$accId = $request->get('id');
		$affected = Contact::create($input);
		$id = $affected->getAttribute('id');
		$request->request->add(['accountid'=>$accId,'contactid'=>$id]);
		$input = $request->all();
		Accounts_Contacts::create($input);
		$request->request->add(['parentid'=>$id, 'parenttype'=>'contact']);
		$input = $request->all();
		Info::create($input);

		return redirect('crm/musteri_yonetimi');
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
		$response = Info::where('parentid','=',$id)->first();


		return view('pages.crm.kisi_yonetimi.guncelle')->with('data',$response);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		
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
		Accounts_Contacts::destroy($id);
		$infoId = Info::where('parentid','=',$id)
			->where('parenttype','=','contact')
			->select('id')->get()->first();
		Info::destroy($infoId['id']);
	}

}
