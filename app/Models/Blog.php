<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','description','image','tags','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'tags',
        'rank',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = ['name','slug','description','image','tags','meta_description','meta_keywords'];
}
