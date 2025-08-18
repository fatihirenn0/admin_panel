<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
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
    'name' => 'array',
    'slug' => 'array',
    'job' => 'array',
    'email' => 'array',
    'telephone' => 'array',
    'image' => 'array',
    'description' => 'array',
    'education' => 'array',
    'work_experience' => 'array',
    'facebook' => 'array',
    'twitter' => 'array',
    'linkedin' => 'array',
    'instagram' => 'array',
    'tiktok' => 'array',
    'youtube' => 'array',
    'github' => 'array',
    'meta_keywords' => 'array',
    'meta_description' => 'array',
];
}
