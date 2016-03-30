<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model {

	protected $table = "info";

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['type', 'status', 'address','citycode',
		'countrycode','phone1', 'phone2','web','taxoff','taxno',
		'acccode','facebook','twitter', 'linkedin','parenttype',
		'parentid', 'xcmpcode','createduser','updateduser','created_at','updated_at'];

}
