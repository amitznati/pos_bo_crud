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
        'propertyable_id',
        'propertyable_type',
        'type',
        'value',
        'mandatory'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'propertyable_id' => 'integer',
        'propertyable_type' => 'string',
        'type' => 'integer',
        'value' => 'string',
        'mandatory' => 'boolean'
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
    public function propertyType()
    {
        return $this->belongsTo(\App\Models\PropertyType::class);
    }

    public function properyable()
    {
        return $this->morphTo('properyable');
    }
}
