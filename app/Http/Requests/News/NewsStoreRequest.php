<?php

namespace App\Http\Requests\News;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();

        $rules['news_categories'] = ['nullable'];
        $rules['news_categories.*'] = ['exists:news_categories,id'];
        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["description.$locale->locale"] = ['nullable', 'string'];
            $rules["tags.$locale->locale"] = ['nullable', 'string', 'max:1000'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
            $rules["image.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        }

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

            $attributes["name.$code"] = "Haber Adı ($lang)";
            $attributes["description.$code"] = "Haber Açıklaması ($lang)";
            $attributes["tags.$code"] = "Etiketler ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
            $attributes["image.$code"] = "Kapak Resmi ($lang)";
        }

        $attributes['news_categories'] = 'Haber Kategori';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }

}
