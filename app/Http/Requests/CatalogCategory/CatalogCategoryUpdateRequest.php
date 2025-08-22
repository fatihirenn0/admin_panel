<?php

namespace App\Http\Requests\CatalogCategory;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class CatalogCategoryUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();
        $rules['catalog_category_id'] = ['nullable', 'exists:catalog_categories,id'];
        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["description.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
            $rules["image.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        }

        $rules['rank'] = ['nullable', 'integer', 'min:0'];
        $rules['url'] = ['nullable','max:255'];

        return $rules;
    }

    public function attributes(): array
    {
        $locales = Locale::all();

        $attributes = [];
        $attributes['catalog_category_id'] = 'Katalog Kategori';
        foreach ($locales as $locale) {
            $code = $locale->locale;
            $lang = $locale->language;

            $attributes["name.$code"] = "Katalog Kategori Adı ($lang)";
            $attributes["description.$code"] = "Katalog Açıklaması ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
            $attributes["image.$code"] = "Kapak Resmi ($lang)";
        }

        $attributes['rank'] = 'Gösterim Sırası';
        $attributes['url'] = 'Dış Bağlantı Link';

        return $attributes;
    }
}
