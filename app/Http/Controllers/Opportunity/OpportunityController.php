<?php namespace App\Http\Controllers\Opportunity;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Contact;
use App\Lead;
use App\Campaign;

use App\Opportunities;
use DB;

use Illuminate\Http\Request;

class OpportunityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$sql = "select o.id,o.name, o.accountid, a.name 'accname' ,o.contactid,c.name 'contname', o.leadid, o.partnerid, o.campaignid,
 			     o.status, o.todate, o.estimatedcost, o.probability, o.scope from opportunities o
		left outer join accounts a on a.id = o.accountid and a.deleted_at is NULL
		left outer join accounts p on p.id = o.partnerid and p.deleted_at is NULL
		left outer join contacts c on o.contactid=c.id and c.deleted_at is NULL
		left outer join campaigns cam on o.campaignid=cam.id and cam.deleted_at is NULL
		left outer join leads l on o.leadid=l.id and l.deleted_at is NULL
		where o.deleted_at is NUll;";

		$oppResult = DB::select($sql);

		// To fill combo boxes in satis_firsati_ekle blade
		$accounts = Account::all(['id', 'name']);
		$contacts = Contact::all(['id','name']);
		$leads = Lead::all(['id','name']);
		$campaigns = Campaign::all(['id','name']);


		return view('pages.crm.satis_firsati_yonetimi.satis_firsati_yonetimi')->with('oppTableData',json_encode($oppResult))
			->with('oppAddAccount',$accounts)->with('oppAddContact',$contacts)->with('oppAddLead',$leads)->with('oppAddCampaign',$campaigns);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$input = $request->all();
		Opportunities::create($input);
		return redirect('crm/satis_firsati_yonetimi');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$items = Subject::all(['id', 'name']);
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
	 * @param  Request request
	 * @return Response
	 */
	public function edit(Request $request)
	{
		$id = $request->input('id');

		//*******************************

		$sql = "select o.id,o.name, o.accountid, a.name 'accname' ,o.contactid,c.name 'contname', o.leadid, o.partnerid, o.campaignid,
 			     o.status, o.todate, o.estimatedcost, o.probability, o.scope from opportunities o
		left outer join accounts a on a.id = o.accountid and a.deleted_at is NULL
		left outer join accounts p on p.id = o.partnerid and p.deleted_at is NULL
		left outer join contacts c on o.contactid=c.id and c.deleted_at is NULL
		left outer join campaigns cam on o.campaignid=cam.id and cam.deleted_at is NULL
		left outer join leads l on o.leadid=l.id and l.deleted_at is NULL
		where o.deleted_at is NULL and o.id = $id ;";
		$response = DB::select($sql);


		// ******************************



		// ******************************
		$accounts = Account::all(['id', 'name']);
		$contacts = Contact::all(['id','name']);
		$leads = Lead::all(['id','name']);
		$campaigns = Campaign::all(['id','name']);


		return view('pages.crm.satis_firsati_yonetimi.guncelle') -> with('data', $response)->with('oppUpdateAccount',$accounts)
			->with('oppUpdateContact',$contacts)->with('oppUpdateLead',$leads)->with('oppUpdateCampaign',$campaigns)->with('id',$id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$result = $request->all();
		$id = $request->input('id');

		$opportunies = Opportunities::find($id);
		$opportunies->update($result);

		return redirect('crm/satis_firsati_yonetimi');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Request request
	 * @return Response
	 */
	public function destroy(Request $request)
	{

		$id = $request->input('id');
		Opportunities::destroy($id);



		return redirect('crm/satis_firsati_yonetimi');
	}

}
