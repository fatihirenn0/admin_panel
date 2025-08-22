<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use SoftDeletes, HasTranslations;


    public $translatable = ['name','slug','short_description','long_description','cover','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'cover',
        'image',
        'rank',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'short_description' => 'array',
        'long_description' => 'array',
        'cover' => 'array',
        'image' => 'array',
        'meta_description' => 'array',
        'meta_keywords'=>'array'
    ];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->tr';
    }

    public function categories()
    {
        return $this->hasManyThrough(
            ServiceCategory::class,      // hedef model
            ServiceServiceCategory::class,  // ara model (pivot gibi davranır)
            'service_id',            // ara modeldeki foreign key
            'id',                 // hedef modeldeki primary key
            'id',                 // service tablosundaki local key
            'service_category_id'         // ara modeldeki hedef model foreign key
        );
    }
}
