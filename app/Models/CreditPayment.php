<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class CreditPayment
 * @package App\Models
 * @version September 3, 2017, 6:33 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection CreditPaymentsDetail
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection paymentTaxes
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property string card_end_with
 * @property integer number_of_payments
 */
class CreditPayment extends Model
{

    public $table = 'credit_payments';
    
    public $timestamps = false;



    public $fillable = [
        'card_end_with',
        'number_of_payments'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'card_end_with' => 'string',
        'number_of_payments' => 'integer'
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
    public function creditPaymentsDetails()
    {
        return $this->hasMany(\App\Models\CreditPaymentsDetail::class);
    }

    public function payment()
    {
        return $this->morphOne('App\Models\Payment','paymentable');
    }
}
