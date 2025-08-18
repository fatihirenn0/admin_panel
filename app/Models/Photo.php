<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Photo extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','image'];

    protected $fillable = [
        'photo_category_id',
        'name',
        'image',
        'rank',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = ['name','image'];
}
