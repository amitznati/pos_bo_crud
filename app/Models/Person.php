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
            'name' => 'first_name', // The db column name
            'label' => "First Name", // Table column heading
            'type' => 'Text'
        ],
        [
            'name' => 'last_name', // The db column name
            'label' => "Last Name", // Table column heading
            'type' => 'Text'
        ],
        [
            'name' => 'full_name', // The db column name
            'label' => "Full Name", // Table column heading
            'type' => 'Text'
        ],
        [
            'name' => 'birthday', // The db column name
            'label' => "Birthday", // Table column heading
            'type' => 'date'
        ],
        [
            'name' => 'phone', // The db column name
            'label' => "Phone Number", // Table column heading
            'type' => 'number'
        ],
        [
            'name' => 'email', // The db column name
            'label' => "Email", // Table column heading
            'type' => 'email'
        ],
        [
            'name' => 'identifier', // The db column name
            'label' => "Identifier", // Table column heading
            'type' => 'Text'
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
