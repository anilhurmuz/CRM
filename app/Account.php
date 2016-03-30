<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model {

    protected $table = 'accounts';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'title', 'status','industry','type','leadsourceid',
        'campaignid','xcmpcode','createduser','updateduser','created_at','updated_at'];





}
