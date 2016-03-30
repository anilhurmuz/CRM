<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model {

    protected $table = 'contacts';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'surname', 'description','bulletin','leadsourceid',
        'campaignid','xcmpcode','createduser','updateduser','created_at','updated_at'];

}
