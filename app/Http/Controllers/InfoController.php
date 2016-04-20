<?php namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lead;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class InfoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{

		$parentType = $request->get('parenttype');
		$id = $request->get('parentid');

		if($parentType == "musteri"){
			$request['parenttype'] = "account";
		}
		else{
			$request['parenttype'] = "lead";
		}

		$input = $request->all();
		$affected = Info::create($input);

		//if type is account, informaitons will be taken from account table
		if($parentType == "musteri"){
			$customer = Account::find($id);
			$sql = "select info.id,info.parentid,info.parenttype,info.type,info.status,info.address ,iller.name citycode, ilceler.name countycode, info.citycode cityid, info.countycode countyid,info.zipcode,info.phone1,info.phone2,info.web,info.taxoff,info.taxno,info.acccode
					from info
					left outer join iller on iller.id=info.citycode
					left outer join ilceler on ilceler.id=info.countycode
					where info.parentid = $id and info.parenttype = 'account' and info.deleted_at is null";

			$tableData = DB::select(DB::raw($sql));
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
		}

		return response()->json($tableData);
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

		$parentid = $request->get('parentid');
		$parenttype = $request->get('parenttype');
		$infoid = $request->get('id');

		if($parenttype == 'account'){
			$customerInfo = Account::find($parentid);
		}
		else{
			$customerInfo = Lead::find($parentid);
		}

		$rowInfo = Info::find($infoid);

		return  view('pages.crm.musteri_yonetimi.address_edit_modal')
			->with('customerInfo',$customerInfo)
			->with('rowInfo',$rowInfo);
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
		$id = $request->get('id');


		$affected = Info::find($id);


		$affected->update($input);

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
		Info::destroy($id);
	}

}
