<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\Account;
use Illuminate\Support\Facades\DB;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('n11', function(){
	return view('n11');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Route::get('crm/musteri_yonetimi', 'Account\AccountController@index');
/*Route::get('crm/musteri_yonetimi', function(){
	return Account::all();
});*/

Route::get('crm/musteri_yonetimi', 'Account\AccountController@index');
Route::post('crm/musteri_yonetimi/create','Account\AccountController@create');
Route::post('crm/musteri_yonetimi/update','Account\AccountController@update');
Route::post('crm/musteri_yonetimi/edit','Account\AccountController@edit');
Route::post('crm/musteri_yonetimi/delete','Account\AccountController@destroy');
Route::post('crm/musteri_yonetimi/kisi_ekle','Contact\ContactController@create');
Route::post('crm/musteri_yonetimi/fill_city_county','Account\AccountController@fillCityCountyBoxes');
Route::post('crm/musteri_yonetimi/contactDeleteInAccount','Contact\ContactController@destroy');

//autocomplete for listing Accounts under MusteriYonetimi List tab.
Route::any('crm/musteri_yonetimi/autocompleteAccListName','Account\AccountController@autocompleteAccListName');
Route::any('crm/musteri_yonetimi/autocompleteAccListTitle','Account\AccountController@autocompleteAccListTitle');



//adding new address information to the Info table.
Route::post('/crm/musteri_yonetimi/adres_ekle','InfoController@create');
Route::post('/crm/musteri_yonetimi/delete_address','InfoController@destroy');
Route::post('/crm/musteri_yonetimi/edit_address','InfoController@edit');
Route::post('/crm/musteri_yonetimi/update_address','InfoController@update');

Route::get('crm/kisi_yonetimi', 'Contact\ContactController@index');
Route::post('crm/kisi_yonetimi/create','Contact\ContactController@create');
Route::post('crm/kisi_yonetimi/delete','Contact\ContactController@destroy');
Route::any('crm/kisi_yonetimi/edit','Contact\ContactController@edit');
Route::post('crm/kisi_yonetimi/update','Contact\ContactController@update');
Route::any('crm/kisi_yonetimi/autocompleteName', 'Contact\ContactController@autocompleteName');
Route::any('crm/kisi_yonetimi/autocompleteSurname', 'Contact\ContactController@autocompleteSurname');
Route::post('crm/kisi_yonetimi/firma_ekle', 'Contact\ContactController@addContactFirm');

Route::get('crm/ebulten_yonetimi', 'Bulletin\BulletinController@index');
Route::post('crm/ebulten_yonetimi/create','Bulletin\BulletinController@create');
Route::post('crm/ebulten_yonetimi/delete','Bulletin\BulletinController@destroy');
Route::post('crm/ebulten_yonetimi/edit','Bulletin\BulletinController@edit');
Route::post('crm/ebulten_yonetimi/update','Bulletin\BulletinController@update');
Route::post('crm/ebulten_yonetimi/checkBulletinName', 'Bulletin\BulletinController@checkBulletinName');
Route::post('crm/ebulten_yonetimi/add_document', 'Bulletin\BulletinController@addDocument');
Route::post('crm/ebulten_yonetimi/delete_document', 'Bulletin\BulletinController@deleteDocument');

Route::get('crm/satis_firsati_yonetimi', 'Opportunity\OpportunityController@index');
Route::post('crm/satis_firsati_yonetimi/create', 'Opportunity\OpportunityController@create');
Route::post('crm/satis_firsati_yonetimi/edit', 'Opportunity\OpportunityController@edit');
Route::post('crm/satis_firsati_yonetimi/update', 'Opportunity\OpportunityController@update');
Route::post('crm/satis_firsati_yonetimi/delete', 'Opportunity\OpportunityController@destroy');


Route::get('crm/{page}','PagesController@index');
