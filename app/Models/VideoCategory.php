<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class VideoCategory extends Model
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

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->'.session('locale','tr');
    }

    public function videos()
    {
        return $this->hasManyThrough(
            Video::class,             // hedef model
            VideoVideoCategory::class, // ara model
            'video_category_id',      // ara modeldeki foreign key (VideoCategory ilişkisi)
            'id',                    // hedef modeldeki primary key
            'id',                    // VideoCategory tablosundaki local key
            'video_id'                // ara modeldeki hedef model foreign key
        );
    }
}
