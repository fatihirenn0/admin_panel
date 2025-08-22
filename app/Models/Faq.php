<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasTranslations, SoftDeletes;

    public array $translatable = ['question', 'answer'];

    protected $fillable = [
        'question',
        'answer',
        'rank',
    ];

    protected $casts = [
        'question' => 'array',
        'answer' => 'array',
    ];

    public function categories()
    {
        return $this->hasManyThrough(
            FaqCategory::class,      // hedef model
            FaqFaqCategory::class,  // ara model (pivot gibi davranır)
            'faq_id',            // ara modeldeki foreign key
            'id',                 // hedef modeldeki primary key
            'id',                 // faq tablosundaki local key
            'faq_category_id'         // ara modeldeki hedef model foreign key
        );
    }
}
