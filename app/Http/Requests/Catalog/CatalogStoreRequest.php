<?php

namespace App\Http\Requests\Catalog;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class CatalogStoreRequest extends FormRequest
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

        $rules['catalog_category_id'] = ['nullable','exists:catalog_categories,id'];
        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["cover.$locale->locale"] = ['nullable', 'cover', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
            $rules["file.$locale->locale"] = ['nullable' , 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar|max:10240'];
            $rules["description".$locale->locale] = ['nullable', 'string'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
        }
        $rules['url'] = ['nullable', 'url', 'max:255'];
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

            $attributes["name.$code"] = "Katalog Adı ($lang)";
            $attributes["cover.$code"] = "Kapak Resmi ($lang)";
            $attributes["file.$code"] = "Dosya ($lang)";
            $attributes["description.$code"] = "Açıklama ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
        }

        $attributes['catalog_category_id'] = 'Katalog Kategori';
        $attributes['url'] = 'Katalog URL';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }

}
