<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use CrudTrait;
	use SoftDeletes;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
	public $table = 'contact';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'birthday',
        'phone',
        'email',
        'address_id',
        'identifier',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'full_name' => 'string',
        'birthday' => 'date',
        'phone' => 'string',
        'email' => 'string',
        'address_id' => 'integer',
        'identifier' => 'string',
    ];

    //protected $table = 'contacts';
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function address()
    {
        return $this->morphOne('App\Models\Address','addressable');
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
