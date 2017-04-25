<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pos extends Model
{
    use CrudTrait;
    use SoftDeletes;
     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'pos';
    protected $primaryKey = 'id';
    //public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name'];
    // protected $hidden = [];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'store_id' => 'integer',
    ];
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        return $this->belongsTo(\App\Models\Store::class);
    }
    
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
