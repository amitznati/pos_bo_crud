<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\CrudTrait;

class Menu extends Model
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
    protected $table = 'menus';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['name'];
    // protected $hidden = [];
    protected $dates = ['deleted_at'];
    
	protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    public static $rules = [
        'name' => 'required|unique:menus|max:255',
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
	public function containsDisplayInfos()
    {
        return $this->hasMany(\App\Models\DisplayInfo::class);
    }

    public function displayInfo()
    {
        return $this->morphMany(\App\Models\DisplayInfo::class, 'displayable');
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
