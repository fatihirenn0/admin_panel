<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    protected $fillable = [
        'blog_id',
        'locale_id',
        'image_url',
        'rank',
        'created_at',
        'updated_at',
    ];
}
