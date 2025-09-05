<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FaqCategory extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'rank',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'name' => 'array',
        'slug' => 'array',
        'meta_keywords' => 'array',
        'meta_description' => 'array',
    ];

    public function faqs()
    {
        return $this->hasManyThrough(
            Faq::class,             // hedef model
            FaqFaqCategory::class, // ara model
            'faq_category_id',      // ara modeldeki foreign key (BlogCategory ilişkisi)
            'id',                    // hedef modeldeki primary key
            'id',                    // BlogCategory tablosundaki local key
            'faq_id'                // ara modeldeki hedef model foreign key
        );
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->'.session('locale','tr');
    }
}
