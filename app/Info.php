<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model {

	protected $table = "info";

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['type', 'status', 'address','citycode',
		'countycode','zipcode','phone1', 'phone2','web','taxoff','taxno',
		'acccode','parenttype', 'parentid', 'xcmpcode','createduser','updateduser','created_at','updated_at'];

}
