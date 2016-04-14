<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bulletin extends Model {

    protected $table = 'bulletins';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'todate', 'documentid','xcmpcode','createduser','updateduser','created_at','updated_at'];


}
