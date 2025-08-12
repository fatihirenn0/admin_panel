<?php

namespace App\Http\Requests\Application;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationCategoryStoreRequest extends FormRequest
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

        // Dil ayarlarını config'den veya helper'dan çekebilirsiniz
        $locales = Locale::all();

        foreach ($locales as $index => $locale) {
            $first = array_key_first((array)$locales) == $index;
            $rules["name.$locale->locale"] = [$first ? 'required' : 'nullable', 'string', 'max:255'];
            $rules["job.$locale->locale"] = ['nullable', 'string'];
            $rules["email.$locale->locale"] = ['nullable', 'string'];
            $rules["experience.$locale->locale"] = ['nullable', 'string'];
            $rules["telephone.$locale->locale"] = ['nullable', 'string'];
            $rules["file.$locale->locale"] = ['nullable', 'mimes:jpg,jpeg,png,gif,webp,avif,svg,pdf,doc,docx,xls,xlsx'];
            $rules["message.$locale->locale"] = ['nullable', 'string'];
            $rules["gender.$locale->locale"] = ['nullable', 'string', 'in:male,female'];
            $rules["department.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["birthdate.$locale->locale"] = ['nullable', 'date_format:d-m-Y', 'before_or_equal:today'];
            $rules["type.$locale->locale"] = ['nullable', 'string'];
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

            $attributes["name.$code"] = "Başvuru Adı ($lang)";
            $attributes["job.$code"] = "Meslek ($lang)";
            $attributes["email.$code"] = "E-Posta Adresi ($lang)";
            $attributes["experience.$code"] = "Tecrübe($lang)";
            $attributes["telephone.$code"] = "Telefon ($lang)";
            $attributes["file.$code"] = "Dosya ($lang)";
            $attributes["message.$code"] = "Mesaj ($lang)";
            $attributes["gender.$code"] = "Cinsiyet ($lang)";
            $attributes["department.$code"] = "Bölüm Departmanı ($lang)";
            $attributes["birthdate.$code"] = "Tarih ($lang)";
            $attributes["type.$code"] = "Tür ($lang)";
        }

        return $attributes;
    }

}
