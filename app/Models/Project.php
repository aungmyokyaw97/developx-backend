<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = 'projects';

    public $fillable = [
        'title',
        'sub_title',
        'description',
        'thumbnail',
        'app_image',
        'web_image'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'sub_title' => 'string',
        'thumbnail' => 'string'
    ];

    public static array $rules = [
        
    ];

    
}
