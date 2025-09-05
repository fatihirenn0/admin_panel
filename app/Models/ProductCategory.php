<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ProductCategory extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','image','meta_description','meta_keywords'];

    protected $fillable = [
        'parent_id',
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

    public function parentCategory()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'parent_id');
    }
}
