<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Property
 * @package App\Models
 * @version May 4, 2017, 7:57 pm UTC
 */
class Property extends Model
{

    public $table = 'properties';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'propertyable_id',
        'propertyable_type',
        'type',
        'valid_values',
        'mandatory'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id' => 'integer',
        'propertyable_id' => 'integer',
        'propertyable_type' => 'string',
        'type' => 'integer',
        'valid_values' => 'string',
        'mandatory' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique|max:255',
    ];

    protected $with = ['propertyType'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propertyType()
    {
        return $this->belongsTo(\App\Models\PropertyType::class,'type');
    }

    public function propertyable()
    {
        return $this->morphTo('propertyable');
    }
}
