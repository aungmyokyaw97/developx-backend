<?php

namespace App\Models;

use Eloquent as Model;

class Menu extends Model
{
    public $table = 'menus';

    public $fillable = [
        'name',
        'order_by'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'order_by' => 'integer',
    ];

    public static $rules = [
        'name' => 'required'
    ];
}