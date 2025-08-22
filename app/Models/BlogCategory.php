<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'rank',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'meta_keywords' => 'array',
        'meta_description' => 'array',
        'image' => 'array',
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->tr';
    }

    public function blogs()
    {
        return $this->hasManyThrough(
            Blog::class,             // hedef model
            BlogBlogCategory::class, // ara model
            'blog_category_id',      // ara modeldeki foreign key (BlogCategory ilişkisi)
            'id',                    // hedef modeldeki primary key
            'id',                    // BlogCategory tablosundaki local key
            'blog_id'                // ara modeldeki hedef model foreign key
        );
    }
}
