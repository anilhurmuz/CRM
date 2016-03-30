<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts_Contacts extends Model {

    protected $table = 'accounts_contacts';


    protected $fillable = ['accountid', 'contactid', 'title','status','leadsourceid','xcmpcode','createduser','updateduser','created_at','updated_at'];

}
