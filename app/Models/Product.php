<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use SoftDeletes, HasTranslations;

    public  $translatable = ['name','slug','short_description','description','tags', 'cover','meta_keywords','meta_description'];

    protected $fillable = [
        'name',
        'slug',
        'code',
        'barcode',
        'price',
        'quantity',
        'short_description',
        'description',
        'tags',
        'cover',
        'video_url',
        'rank',
        'meta_keywords',
        'meta_description',
    ];

    protected $casts =  ['name','slug','short_description','description','tags', 'cover','meta_keywords','meta_description'];
}
