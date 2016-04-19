<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts_Contacts extends Model {

    protected $table = 'accounts_contacts';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['accountid', 'contactid', 'title','status','leadsourceid','xcmpcode','createduser','updateduser','created_at','updated_at'];

}
