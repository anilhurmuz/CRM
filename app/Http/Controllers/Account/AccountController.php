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


		return view('pages.crm.musteri_yonetimi.guncelle')->with('data',$response);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{

		$type = $request->get('type');
		$input = $request->all();
		$id = $request->get('id');
		$currentStatus = Info::find($id);
		$parenttype = $currentStatus->get('parenttype');

		if($type == 'potansiyel'){
			//to get information of currently added row
			$lead = Lead::find($id);

			if($parenttype == 'lead'){
				$lead->update($input);
			}else if($parenttype == 'account'){

			}
		}

		else if($type == 'musteri'){
			//to get information of currently added row
			$account = Account::find($id);
			$account->update($input);
		}

		$info = Info::where('parentid','=',$id)->get();

		$info->update($input);

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

		Info::where('parentid','=',$id)->delete();

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
