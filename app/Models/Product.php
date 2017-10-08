<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use CrudTrait;
	use SoftDeletes;
     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'products';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $dates = ['deleted_at'];
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    public $fillable = [
        'name',
        'dept_id',
        'group_id',
        'vendor_id',
        'sale_price',
        'bay_price',
        'barcode',
        'brand',
        'description'
    ];
	
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'dept_id' => 'integer',
        'group_id' => 'integer',
        'vendor_id' => 'integer',
        'sale_price' => 'decimal',
        'bay_price' => 'decimal',
        'barcode' => 'string',
        'brand' => 'string',
        'description' => 'string'
    ];

    public static $rules = [
        'name' => 'required|unique:products|max:255',
        'sale_price' => 'required',
        'dept_id' => 'required',
        'group_id' => 'required'
    ];

    /*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/

        /*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	 /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class, 'dept_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function group()
    {
        return $this->belongsTo(\App\Models\Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function orders()
    {
        return $this->belongsToMany(\App\Models\Order::class, 'order_lines');
    }

    public function displayInfo()
    {
        return $this->morphMany(\App\Models\DisplayInfo::class, 'displayable');
    }

    public function properties()
    {
        return $this->morphMany(\App\Models\Property::class, 'propertyable');
    }

	
    /*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| ACCESORS
	|--------------------------------------------------------------------------
	*/

    /*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
}
