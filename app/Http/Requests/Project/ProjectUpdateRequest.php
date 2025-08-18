<?php

namespace App\Http\Requests\Project;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();

        $rules['project_categories'] = ['nullable'];
        $rules['project_categories.*'] = ['exists:project_categories,id'];
        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["description.$locale->locale"] = ['nullable', 'string'];
            $rules["tags.$locale->locale"] = ['nullable', 'string', 'max:1000'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
            $rules["image.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        }

        $rules['client'] = ['nullable', 'max:255'];
        $rules['city'] = ['nullable', 'max:255'];
        $rules['start_date'] = ['nullable', 'date'];
        $rules['end_date'] = ['nullable', 'date'];
        $rules['rank'] = ['nullable', 'integer', 'min:0'];

        return $rules;
    }

    public function attributes(): array
    {
        $locales = Locale::all();

        $attributes = [];
        foreach ($locales as $locale) {
            $code = $locale->locale;
            $lang = $locale->language;

            $attributes["name.$code"] = "Proje Adı ($lang)";
            $attributes["description.$code"] = "Proje Açıklaması ($lang)";
            $attributes["tags.$code"] = "Etiketler ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
            $attributes["image.$code"] = "Kapak Resmi ($lang)";
        }

        $attributes['client'] = __('Müşteri');
        $attributes['city'] = __('İl/Bölge');
        $attributes['start_date'] = __('Başlama Tarihi');
        $attributes['end_date'] = __('Bitiş Tarihi');
        $attributes['project_categories'] = 'Proje Kategori';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
