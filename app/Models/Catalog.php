<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Catalog extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','description','cover','file','meta_description','meta_keywords'];

    protected $fillable = [
        'catalog_category_id',
        'name',
        'slug',
        'cover',
        'file',
        'description',
        'rank',
        'url',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = ['name','slug','description','cover','file','meta_description','meta_keywords'];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->'.session('locale','tr');
    }
}
