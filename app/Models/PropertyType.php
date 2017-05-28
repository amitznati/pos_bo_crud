<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PropertyType
 * @package App\Models
 * @version May 4, 2017, 7:57 pm UTC
 */
class PropertyType extends Model
{

    public $table = 'property_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'options_required'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'options_required' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function properties()
    {
        return $this->hasMany(\App\Models\Property::class);
    }
}
