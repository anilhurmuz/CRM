<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunities extends Model {

    protected $table = 'opportunities';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'accountid', 'partnerid','contactid','sourceid','estimatedcost',
        'campaignid','xcmpcode','leadid','todate','status','phase','probability','scope',
        'createduser','updateduser','created_at','updated_at'];

}
