<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model {


    protected $table = 'document';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['type', 'url', 'expdate', 'categoryid', 'subcategoryid', 'status', 'revision', 'parenttype', 'parentid','xcmpcode','createduser','updateduser','created_at','updated_at'];

}
