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

//     public static $create_fields = [
//     		[
//     				'name' => 'first_name',
//     				'label' => trans('pos.people.person.first_name'),
//     				'type' => 'Text'
//     		],
//     		[
//     				'name' => 'last_name',
//     				'label' => trans('pos.people.person.last_name'),
//     				'type' => 'Text'
//     		],
//     		[
//     				'name' => 'full_name',
//     				'label' => trans('pos.people.person.full_name'),
//     				'type' => 'Text'
//     		],
//     		[
//     				'name' => 'birthday',
//     				'label' => trans('pos.people.person.birthday'),
//     				'type' => 'date'
//     		],
//     		[
//     				'name' => 'phone',
//     				'label' => trans('pos.people.person.phone'),
//     				'type' => 'number'
//     		],
//     		[
//     				'name' => 'email',
//     				'label' => trans('pos.people.person.email'),
//     				'type' => 'email'
//     		],
//     		[
//     				'name' => 'identifier',
//     				'label' => trans('pos.people.person.identifier'),
//     				'type' => 'Text'
//     		],
    		
//     ];
    
//     public static $show_fields = [
//         [
//             'function_name' => 'personObj', 
//             'label' => trans('pos.people.person.first_name'), 
//             'type' => 'model_function_attribute',
//             'attribute' => 'first_name'
//         ],
//         [
//             'function_name' => 'personObj', 
//             'label' => trans('pos.people.person.last_name'), 
//             'type' => 'model_function_attribute',
//             'attribute' => 'last_name'
//         ],
//         [
//             'function_name' => 'personObj', 
//             'label' => trans('pos.people.person.birthday'), 
//             'type' => 'model_function_attribute',
//             'attribute' => 'birthday'
//         ],
//         [
//             'function_name' => 'personObj', 
//             'label' => trans('pos.people.person.email'),  
//             'type' => 'model_function_attribute',
//             'attribute' => 'email'
//         ],
//         [
//             'function_name' => 'personObj', 
//             'label' => trans('pos.people.person.phone'),  
//             'type' => 'model_function_attribute',
//             'attribute' => 'phone'
//         ],


//     ];
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

    public static function getShowFields()
    {
    	$show_fields = [
    			[
    					'function_name' => 'personObj',
    					'label' => trans('pos.people.person.first_name'),
    					'type' => 'model_function_attribute',
    					'attribute' => 'first_name'
    			],
    			[
    					'function_name' => 'personObj',
    					'label' => trans('pos.people.person.last_name'),
    					'type' => 'model_function_attribute',
    					'attribute' => 'last_name'
    			],
    			[
    					'function_name' => 'personObj',
    					'label' => trans('pos.people.person.birthday'),
    					'type' => 'model_function_attribute',
    					'attribute' => 'birthday'
    			],
    			[
    					'function_name' => 'personObj',
    					'label' => trans('pos.people.person.email'),
    					'type' => 'model_function_attribute',
    					'attribute' => 'email'
    			],
    			[
    					'function_name' => 'personObj',
    					'label' => trans('pos.people.person.phone'),
    					'type' => 'model_function_attribute',
    					'attribute' => 'phone'
    			],
    			
    			
    	];
    	return $show_fields;
    }
}
