<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Order
 * @package App\Models
 * @version September 2, 2017, 9:28 pm UTC
 *
 * @property \App\Models\OrderPayment orderPayment
 * @property \App\Models\Customer customer
 * @property \App\Models\Employee employee
 * @property \App\Models\Po po
 * @property \App\Models\ZReport zReport
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection PaymentTax
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property integer customer_id
 * @property integer employee_id
 * @property boolean IsCloseInZ
 * @property integer z_num
 * @property integer daily_number
 * @property integer pos_id
 * @property integer order_payment_id
 */
class Order extends Model
{

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    
    public $fillable = [
        'customer_id',
        'employee_id',
        'IsCloseInZ',
        'z_num',
        'daily_number',
        'pos_id',
        'order_payment_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'customer_id' => 'integer',
        'employee_id' => 'integer',
        'IsCloseInZ' => 'boolean',
        'z_num' => 'integer',
        'daily_number' => 'integer',
        'pos_id' => 'integer',
        'order_payment_id' => 'integer'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pos()
    {
        return $this->belongsTo(\App\Models\Pos::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function zReport()
    {
        return $this->belongsTo(\App\Models\ZReport::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function orderLines()
    {
        return $this->hasMany(\App\Models\OrderLine::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function paymentTaxes()
    {
        return $this->hasMany(\App\Models\PaymentTax::class);
    }
}
