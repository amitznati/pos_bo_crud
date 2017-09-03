<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class DailyAttendance
 * @package App\Models
 * @version September 3, 2017, 6:37 am UTC
 *
 * @property \App\Models\Employee employee
 * @property \Illuminate\Database\Eloquent\Collection employeeHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection employeeHasRoles
 * @property \Illuminate\Database\Eloquent\Collection employeeSalery
 * @property \Illuminate\Database\Eloquent\Collection orderLines
 * @property \Illuminate\Database\Eloquent\Collection paymentTaxes
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection relVandorContact
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property integer employee_id
 * @property string|\Carbon\Carbon entryTime
 * @property string|\Carbon\Carbon exitTime
 * @property boolean isPresent
 */
class DailyAttendance extends Model
{

    public $table = 'daily_attendance';
    
    public $timestamps = false;



    public $fillable = [
        'employee_id',
        'entryTime',
        'exitTime',
        'isPresent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'employee_id' => 'integer',
        'isPresent' => 'boolean'
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
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }
}
