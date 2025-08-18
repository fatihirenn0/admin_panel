<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasTranslations;

    public $translatable = ['job','description','education','work_experience','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'job',
        'email',
        'telephone',
        'image',
        'description',
        'education',
        'work_experience',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'tiktok',
        'youtube',
        'github',
        'rank',
        'meta_description',
        'meta_keywords',
    ];
    protected $casts = [
        'job' => 'array',
        'description' => 'array',
        'education' => 'array',
        'work_experience' => 'array',
        'image' => 'array',
        'meta_description' => 'array',
        'meta_keywords' => 'array'
    ];
}
