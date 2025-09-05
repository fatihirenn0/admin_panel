<?php

namespace App\Http\Requests\Product;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $locales = Locale::all();

        $rules['product_categories'] = ['nullable'];
        $rules['product_categories.*'] = ['exists:product_categories,id'];
        $rules['code'] = ['nullable', 'string', 'max:255'];
        $rules['barcode'] = ['nullable', 'string', 'max:255'];
        $rules['price'] = ['nullable', 'numeric', 'max:9999999.99'];
        $rules['quantity'] = ['nullable', 'integer', 'min:0'];

        $rules['attribute.*.title.*'] = ['nullable', 'string','max:65255'];
        $rules['attribute.*.description.*'] = ['nullable', 'string','max:65255'];

        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["short_description.$locale->locale"] = ['nullable', 'string'];
            $rules["tags.$locale->locale"] = ['nullable', 'string'];
            $rules["description.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
            $rules["cover.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        }

        $rules['rank'] = ['nullable', 'integer', 'min:0'];
        $rules['video_url'] = ['nullable', 'sting', 'max:255'];

        return $rules;
    }

    public function attributes(): array
    {
        $locales = Locale::all();

        $attributes = [];
        foreach ($locales as $locale) {
            $code = $locale->locale;
            $lang = $locale->language;

            $attributes["name.$code"] = "Ürün Adı ($lang)";
            $attributes["short_description.$code"] = "Ürün Kısa Açıklaması ($lang)";
            $attributes["description.$code"] = "Ürün Tam Açıklaması ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
            $attributes["tags.$code"] = "Etiket ($lang)";
            $attributes["cover.$code"] = "Kapak Resmi ($lang)";
        }

        $attributes['code'] = 'Ürün Kodu';
        $attributes['barcode'] = 'Ürün Barkodu';
        $attributes['price'] = 'Ürün Fiyatı';
        $attributes['quantity'] = 'Stok Adeti';
        $attributes['product_categories'] = 'Ürün Kategori';
        $attributes['video_url'] = 'Video Linki';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
