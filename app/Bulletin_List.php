<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bulletin_List extends Model {

    protected $table = "bulletin_list";

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['bulletinid', 'parenttype', 'parentid','xcmpcode','createduser','updateduser','created_at','updated_at'];

}
