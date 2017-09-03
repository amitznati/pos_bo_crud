<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Payment
 * @package App\Models
 * @version September 2, 2017, 9:32 pm UTC
 *
 * @property \App\Models\OrderPayment orderPayment
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection paymentTaxes
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property integer order_payment_id
 * @property integer paymentable_id
 * @property string paymentable_type
 */
class Payment extends Model
{

    public $table = 'payments';
    
    const CREATED_AT = 'created_at';

    public $fillable = [
        'order_payment_id',
        'paymentable_id',
        'paymentable_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order_payment_id' => 'integer',
        'paymentable_id' => 'integer',
        'paymentable_type' => 'string'
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
    public function orderPayment()
    {
        return $this->belongsTo(\App\Models\OrderPayment::class);
    }

    public function paymentable()
    {
        return $this->morphTo('paymentable');
    }
}
