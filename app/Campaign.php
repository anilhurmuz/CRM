<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model {

    protected $table = 'campaigns';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'fromdate', 'todate','status','type',
        'budget','cost','estimatedcost','estimatedrevenue','impression','objective','description',
        'trackerid','trackercount','trackertext','xcmpcode',
        'createduser','updateduser','created_at','updated_at'];

}
