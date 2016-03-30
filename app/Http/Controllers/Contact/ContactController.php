<?php namespace App\Http\Controllers\Contact;

use App\Account;
use App\Accounts_Contacts;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contactData = Contact::all();
		$accountContactData = Accounts_Contacts::all();

		return view('pages.crm.kisi_yonetimi')->with('mydata',json_encode($contactData));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create(Request $request)
	{

		$input = $request->all();
		//to get information of currently added row
		$affected = Contact::create($input);

		//to find id of currently added row in database
		$id = $affected->getAttribute('id');
		//to add new attributes to the existing request and save them into Info table.
		$request->request->add(['parentid'=>$id,'parenttype'=>'contact']);
		$input = $request->all();
		Info::create($input);

		return redirect('crm/kisi_yonetimi');
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
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		Account::destroy($request->get('id'));
	}

}
