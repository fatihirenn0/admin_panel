<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['name','slug','description','image','meta_description','meta_keywords'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'client',
        'start_date',
        'end_date',
        'city',
        'rank',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = ['name','slug','description','image','meta_description','meta_keywords'];

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug->'.session('locale','tr');
    }

    public function categories()
    {
        return $this->hasManyThrough(
            ProjectCategory::class,      // hedef model
            ProjectProjectCategory::class,  // ara model (pivot gibi davranır)
            'project_id',            // ara modeldeki foreign key
            'id',                 // hedef modeldeki primary key
            'id',                 // project tablosundaki local key
            'project_category_id'         // ara modeldeki hedef model foreign key
        );
    }
}
