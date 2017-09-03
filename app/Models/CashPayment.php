<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class CashPayment
 * @package App\Models
 * @version September 3, 2017, 6:31 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection paymentTaxes
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property decimal recieved_amount
 * @property decimal change
 */
class CashPayment extends Model
{

    public $table = 'cash_payments';
    
    public $timestamps = false;



    public $fillable = [
        'recieved_amount',
        'change'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function payment()
    {
        return $this->morphOne('App\Models\Payment','paymentable');
    }

    
}
