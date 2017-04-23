<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Person
 * @package App\Models
 * @version February 22, 2017, 10:36 am UTC
 */
class Person extends Model
{
    use SoftDeletes;

    public $table = 'persons';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public static $create_fields = [
        [
            'name' => 'first_name', 
            'label' => "First Name", 
            'type' => 'Text'
        ],
        [
            'name' => 'last_name', 
            'label' => "Last Name", 
            'type' => 'Text'
        ],
        [
            'name' => 'full_name', 
            'label' => "Full Name", 
            'type' => 'Text'
        ],
        [
            'name' => 'birthday', 
            'label' => "Birthday", 
            'type' => 'date'
        ],
        [
            'name' => 'phone', 
            'label' => "Phone Number", 
            'type' => 'number'
        ],
        [
            'name' => 'email', 
            'label' => "Email", 
            'type' => 'email'
        ],
        [
            'name' => 'identifier', 
            'label' => "Identifier", 
            'type' => 'Text'
        ],

    ];

    public static $show_fields = [
        [
            'function_name' => 'personObj', 
            'label' => "First Name", 
            'type' => 'model_function_attribute',
            'attribute' => 'first_name'
        ],
        [
            'function_name' => 'personObj', 
            'label' => "Last Name", 
            'type' => 'model_function_attribute',
            'attribute' => 'last_name'
        ],
        [
            'function_name' => 'personObj', 
            'label' => "Birthday", 
            'type' => 'model_function_attribute',
            'attribute' => 'birthday'
        ],
        [
            'function_name' => 'personObj', 
            'label' => "Email", 
            'type' => 'model_function_attribute',
            'attribute' => 'email'
        ],
        [
            'function_name' => 'personObj', 
            'label' => "Phone", 
            'type' => 'model_function_attribute',
            'attribute' => 'phone'
        ],


    ];
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
        'personable_id',
        'personable_type'
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
        'personable_id' => 'integer',
        'personable_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function address()
    {
        return $this->morphOne('App\Models\Address','addressable');
    }

    public function personable()
    {
        return $this->morphTo('personable');
    }
}
