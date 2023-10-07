<?php

namespace App\Models;

use Eloquent as Model;

class Post extends Model
{
    public $table = 'posts';

    public $fillable = [
        'title',
        'sub_title',
        'image',
        'description',
        'menu_id',
        'order_by'
    ];

    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'sub_title' => 'string',
        'image' => 'string',
        'description' => 'string',
        'menu_id' => 'integer',
        'order_by' => 'integer',
    ];

    public static $rules = [
        'name' => 'required',
        'menu_id' => 'required',
    ];

    public function menu()
    {
        return $this->hasMany('App\Models\Menu', 'menu_id');
    }

    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        if (!is_null($this->image)) {
            $directory = config('cms.image.post');
            $imagePath = 'https://linyaungchi.sgp1.digitaloceanspaces.com' . '/' . $directory . '/' . $this->image;
            $imageUrl = asset($imagePath);
        }
        return $imageUrl;  
    }
}