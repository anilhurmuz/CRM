<?php namespace App\Http\Controllers\Account;

use App\Account;
use App\City;
use App\County;
use App\Lead;
use App\Info;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//because it is related with two tables with common columns, union & raw query method is used.
		$sql = "select id,name,title,status,industry,type from accounts where deleted_at is NULL
				UNION
				select id,name,title,status,industry,type from leads where deleted_at is NULL
				order by name";

		$res = DB::select(DB::raw($sql));
		return view('pages.crm.musteri_yonetimi.musteri_yonetimi')->with('mydata',json_encode($res));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$type = $request->get('type');
		$input = $request->all();

		if($type == 'potansiyel' || $type == 'muhtemel'){
			//to get information of currently added row
			$affected = Lead::create($input);
			//to find id of currently added row in database
			$id = $affected->getAttribute('id');
			//to add new attributes to the existing request and save them into Info table.
			$request->request->add(['parentid'=>$id,'parenttype'=>'lead']);

		}

		else{
			//to get information of currently added row
			$affected = Account::create($input);
			//to find id of currently added row in database
			$id = $affected->getAttribute('id');
			//to add new attributes to the existing request and save them into Info table.
			$request->request->add(['parentid'=>$id,'parenttype'=>'account']);
		}

		//$input = $request->all();
		//Info::create($input);

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
		$type = $request->get('type');



		//if type is account, informaitons will be taken from account table
		if($type == "musteri"){
			$customer = Account::find($id);
			$sql = "select info.id,info.parentid,info.parenttype,info.type,info.status,info.address ,iller.name citycode, ilceler.name countycode, info.citycode cityid, info.countycode countyid,info.zipcode,info.phone1,info.phone2,info.web,info.taxoff,info.taxno,info.acccode
					from info
					left outer join iller on iller.id=info.citycode
					left outer join ilceler on ilceler.id=info.countycode
					where info.parentid = $id and info.parenttype = 'account' and info.deleted_at is null";

			$tableData = DB::select(DB::raw($sql));

			//Fill Kişiler Datatable Part
			$sql = "select c.id, c.name, c.surname, a.status, a.title, c.phone1, c.phone2, c.facebook, c.twitter, c.linkedin, c.description, c.bulletin, ac.name 'account', a.accountid 'accountid' from contacts c
			left outer join accounts_contacts a on a.contactid = c.id
			left outer join accounts ac on a.accountid = ac.id where a.accountid=$id and c.deleted_at is NULL and a.id = (SELECT MAX(id) FROM accounts_contacts acs WHERE acs.contactid = c.id);";
			$record = DB::select($sql);
		}

		//if type is lead, informaitons will be taken from lead table
		else{
			$customer = Lead::find($id);
			$sql = "select info.id,info.parentid,info.parenttype,info.type,info.status,info.address ,iller.name citycode, ilceler.name countycode, info.citycode cityid, info.countycode countyid, info.zipcode,info.phone1,info.phone2,info.web,info.taxoff,info.taxno,info.acccode
					from info
					left outer join iller on iller.id=info.citycode
					left outer join ilceler on ilceler.id=info.countycode
					where info.parentid = $id and info.parenttype = 'lead' and info.deleted_at is null";
			$tableData = DB::select(DB::raw($sql));

			$record = null;
		}

		return view('pages.crm.musteri_yonetimi.guncelle')->with('type',$type)->with('customerInfo',$customer)->with('tableDataAddress',json_encode($tableData))->with('tableDataContact', json_encode($record));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{

		//getting the current selected type from the interface.
		$selectedType = $request->get('type');
		//updating request with new selected type.
		$request->request->add(['parenttype'=>$selectedType]);
		$input = $request->all();

		//getting hidden id form field.
		$id = $request->get('id');

		$isAccount = Account::find($id);

		if($isAccount == null && $selectedType == 'musteri'){
			//move the records from Leads to Accounts table
			Lead::destroy($id);
			$affected = Account::create($input);
			//id is changed because the record is moved to another table.
			$affectedParentId = $affected->getAttribute('id');
			Info::where('parentid', '=',$id)->where('parenttype','=','lead')->update(['parentid' => $affectedParentId,'parenttype'=>'account']);
		}
		else if($selectedType == 'musteri'){
			//updating the Accounts table.
			$account = Account::find($id);
			$account->update($input);
		}
		else{
			//updating the Leads table.
			$lead = Lead::find($id);
			$lead->update($input);
		}

		return redirect('crm/musteri_yonetimi');

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
		$type = $request->get('type');

		if($type == 'musteri')
			Account::destroy($id);
		else
			Lead::destroy($id);


	}


	//To fill citiest & counties.
	public function fillCityCountyBoxes(Request $request){
		$req = $request->get('request');

		if($req == 'city'){
			$response = City::all();
		}
		else if($req == 'county'){
			$cityId= $request->get('cityId');
			$response = County::where('il_id','=',$cityId)->get();
		}



		return response()->json($response);
	}

}
