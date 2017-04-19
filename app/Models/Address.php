<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use CrudTrait;
	use SoftDeletes;

     /*
	|--------------------------------------------------------------------------
	| GLOBAL VARIABLES
	|--------------------------------------------------------------------------
	*/
	public $table = 'addresses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public static $create_fields = [
        [
            'name' => 'city', // The db column name
            'label' => "City", // Table column heading
            'type' => 'Text'
        ],
        [
            'name' => 'street_name', // The db column name
            'label' => "Street Name", // Table column heading
            'type' => 'Text'
        ],        
        [
            'name' => 'street_number', // The db column name
            'label' => "Street Number", // Table column heading
            'type' => 'number'
        ],
        [
            'name' => 'hous_number', // The db column name
            'label' => "Hous Number", // Table column heading
            'type' => 'number'
        ],
        [
            'name' => 'zip', // The db column name
            'label' => "Zip Code", // Table column heading
            'type' => 'number'
        ],

    ];

    public $fillable = [
        'street_name',
        'street_number',
        'hous_number',
        'city',
        'zip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'street_name' => 'string',
        'street_number' => 'integer',
        'hous_number' => 'integer',
        'city' => 'string',
        'zip' => 'integer'
    ];

    //protected $table = 'addresss';
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
	public function addressable()
    {
        return $this->morphTo('addressable');
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
