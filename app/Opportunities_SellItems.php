<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunities_SellItems extends Model {

    protected $table = 'opportunities_sellitem';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'amount', 'cost','totalcost','discountrate','opportunityid',
        'xcmpcode', 'createduser','updateduser','created_at','updated_at'];

}
