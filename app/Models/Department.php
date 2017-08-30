<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use CrudTrait;
	use SoftDeletes;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
	public $table = 'departments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $with = ['groups'];
    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'required|unique|max:255',
    ];
    //protected $table = 'departments';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function groups()
    {
        return $this->hasMany(\App\Models\Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
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
