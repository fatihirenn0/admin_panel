<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ServiceCategory extends Model
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
        return 'slug->'.session('locale','tr');
    }

    public function services()
    {
        return $this->hasManyThrough(
            Service::class,             // hedef model
            ServiceServiceCategory::class, // ara model
            'service_category_id',      // ara modeldeki foreign key (ProjectCategory ilişkisi)
            'id',                    // hedef modeldeki primary key
            'id',                    // ProjectCategory tablosundaki local key
            'service_id'                // ara modeldeki hedef model foreign key
        );
    }
}
