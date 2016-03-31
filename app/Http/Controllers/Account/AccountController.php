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
		$sql = "";
		$id = $request->get('data');
		$response = Info::where('parentid','=',$id)->first();
		$type = $response->getAttribute('parenttype');

		//if type is lead, informaitons will be taken from lead table
		if($type == "lead"){
			$customer = Lead::find($id);
		}
		//if type is account, informaitons will be taken from account table
		else{
			$customer = Account::find($id);
		}


		return view('pages.crm.musteri_yonetimi.guncelle')->with('infoData',$response)->with('customerInfo',$customer);
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

		//getting the current Informations of the selected person.
		$currentRecord = Info::where("parentid","=",$id)->first();
		//assigning current type stored in the Info table.
		$parentType = $currentRecord->getAttribute('parenttype');


		$isChangedType = ($selectedType == 'musteri' && $parentType == 'lead');

		if($isChangedType){
			//move the records from Leads to Accounts table
			Lead::destroy($id);
			$affected = Account::create($input);
			//id is changed because the record is moved to another table.
			$affectedParentId = $affected->getAttribute('id');
			$lastType = "account";
		}
		else if(!$isChangedType && $selectedType == 'musteri'){
			//updating the Accounts table.
			$account = Account::find($id);
			$account->update($input);
			$lastType = "account";
		}
		else{
			//updating the Leads table.
			$lead = Lead::find($id);
			$lead->update($input);
			$lastType = "lead";
		}

		//updating request with correct customer type
		$request->request->add(['parenttype'=>$lastType]);
		if(isset($affectedParentId)) {$request->request->add(['parentid'=>$affectedParentId]);}
		$input = $request->all();

		//after all, for all statements, updating the Info table with new inputs.
		$info = Info::where('parentid','=',$id)->first();
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
