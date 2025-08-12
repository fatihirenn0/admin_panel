<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Milestone extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','image','description','date'];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'date',
        'rank',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'description' => 'array',
        'date' => 'array',
        'image' => 'array',
    ];
}
