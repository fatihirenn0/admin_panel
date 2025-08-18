<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use SoftDeletes, HasTranslations;


    public $translatable = ['name','slug','short_description','long_description','cover','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'cover',
        'image',
        'rank',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'short_description' => 'array',
        'long_description' => 'array',
        'cover' => 'array',
        'image' => 'array',
        'meta_description' => 'array',
        'meta_keywords'=>'array'
    ];
}
