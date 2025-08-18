<?php

namespace App\Http\Requests\Service;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();

        $rules['service_categories'] = ['nullable'];
        $rules['service_categories.*'] = ['exists:service_categories,id'];
        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["short_description.$locale->locale"] = ['nullable', 'string'];
            $rules["long_description.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
            $rules["image.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
            $rules["cover.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
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

            $attributes["name.$code"] = "Hizmet Adı ($lang)";
            $attributes["short_description.$code"] = "Hizmet Kısa Açıklaması ($lang)";
            $attributes["long_description.$code"] = "Hizmet Tam Açıklaması ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
            $attributes["image.$code"] = "Alt Resim ($lang)";
            $attributes["cover.$code"] = "Kapak Resmi ($lang)";
        }

        $attributes['service_categories'] = 'Hizmet Kategori';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
