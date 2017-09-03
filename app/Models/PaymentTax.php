<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class PaymentTax
 * @package App\Models
 * @version September 2, 2017, 9:32 pm UTC
 *
 * @property \App\Models\Tax tax
 * @property \App\Models\Order order
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property integer payment_id
 * @property integer tax_id
 * @property decimal tax_amount
 */
class PaymentTax extends Model
{

    public $table = 'payment_taxes';
    
    const CREATED_AT = 'created_at';

    public $fillable = [
        'payment_id',
        'tax_id',
        'tax_amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_id' => 'integer',
        'tax_id' => 'integer'
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
    public function tax()
    {
        return $this->belongsTo(\App\Models\Tax::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function payment()
    {
        return $this->belongsTo(\App\Models\Payment::class);
    }
}
