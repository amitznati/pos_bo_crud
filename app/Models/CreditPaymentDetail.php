<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class CreditPaymentDetail
 * @package App\Models
 * @version September 3, 2017, 6:35 am UTC
 *
 * @property \App\Models\CreditPayment creditPayment
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection paymentTaxes
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property integer credit_payment_id
 * @property integer PaymentNumber
 * @property decimal Amount
 * @property string|\Carbon\Carbon pay_date
 */
class CreditPaymentDetail extends Model
{

    public $table = 'credit_payments_details';
    
    public $timestamps = false;

    public $fillable = [
        'credit_payment_id',
        'PaymentNumber',
        'Amount',
        'pay_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'credit_payment_id' => 'integer',
        'PaymentNumber' => 'integer'
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
    public function creditPayment()
    {
        return $this->belongsTo(\App\Models\CreditPayment::class);
    }
}
