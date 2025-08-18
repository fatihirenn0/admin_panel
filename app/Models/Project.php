<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','description','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'client',
        'start_date',
        'end_date',
        'city',
        'rank',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = ['name','slug','description','image','meta_description','meta_keywords'];
}
