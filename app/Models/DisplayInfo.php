<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DisplayInfo
 * @package App\Models
 * @version March 5, 2017, 9:41 pm UTC
 */
class DisplayInfo extends Model
{
    

    public $timestamps = false;

    public $table = 'display_info';

    public $fillable = [
        'menu_id',
        'displayable_id',
        'displayable_type',
        'display_name',
        'x',
        'y',
        'width',
        'height',
        'backgroundColor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menu_id' => 'integer',
        'displayable_id' => 'integer',
        'displayable_type' => 'string',
        'display_name' => 'string',
        'x' => 'integer',
        'y' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'backgroundColor' => 'string'
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
    public function menu()
    {
        return $this->belongsTo(\App\Models\Menu::class);
    }

    public function displayable()
    {
        return $this->morphTo('displayable');
    }
}
