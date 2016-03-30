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

Route::post('crm/musteri_yonetimi/fill_city_county','Account\AccountController@fillCityCountyBoxes');

Route::get('crm/kisi_yonetimi', 'Contact\ContactController@index');
Route::post('crm/kisi_yonetimi/create','Contact\ContactController@create');

Route::get('crm/{page}','PagesController@index');

