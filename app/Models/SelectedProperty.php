<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class SelectedProperty
 * @package App\Models
 * @version September 3, 2017, 7:08 am UTC
 *
 * @property \App\Models\OrderLine orderLine
 * @property \App\Models\Property property
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection paymentTaxes
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property integer property_id
 * @property integer order_line_id
 * @property string selected_value
 */
class SelectedProperty extends Model
{

    public $table = 'selected_properties';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'property_id',
        'order_line_id',
        'selected_value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'property_id' => 'integer',
        'order_line_id' => 'integer',
        'selected_value' => 'string'
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
    public function orderLine()
    {
        return $this->belongsTo(\App\Models\OrderLine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function property()
    {
        return $this->belongsTo(\App\Models\Property::class);
    }
}
