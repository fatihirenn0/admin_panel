<?php

namespace App\Http\Requests\Team;

use App\Models\Locale;
use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
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
            $rules["telephone.$locale->locale"] = ['nullable', 'string'];
            $rules["description.$locale->locale"] = ['nullable', 'string'];
            $rules["education.$locale->locale"] = ['nullable', 'string'];
            $rules["work_experience.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_description.$locale->locale"] = ['nullable', 'string'];
            $rules["meta_keywords.$locale->locale"] = ['nullable', 'string'];
            $rules["image.$locale->locale"] = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'];
        }
        $rules['facebook'] = ['nullable', 'string'];
        $rules['twitter'] = ['nullable', 'string'];
        $rules['linkedin'] = ['nullable', 'string'];
        $rules['instagram'] = ['nullable', 'string'];
        $rules['tiktok'] = ['nullable', 'string'];
        $rules['youtube'] = ['nullable', 'string'];
        $rules['github'] = ['nullable', 'string'];
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

            $attributes["name.$code"] = "Ekip Adı ($lang)";
            $attributes["job.$code"] = "Meslek ($lang)";
            $attributes["email.$code"] = "E-Posta Adresi ($lang)";
            $attributes["telefon.$code"] = "Telefon ($lang)";
            $attributes["description.$code"] = "Açıklama ($lang)";
            $attributes["education.$code"] = "Eğitim ($lang)";
            $attributes["work_experience.$code"] = "Tecrübe ($lang)";
            $attributes["meta_keywords.$code"] = "Meta Anahtar Kelimeler ($lang)";
            $attributes["meta_description.$code"] = "Meta Açıklama ($lang)";
            $attributes["image.$code"] = "Resmi ($lang)";
        }

        $attributes['facebook'] = "Facebook";
        $attributes['twitter'] = 'Twitter';
        $attributes['instagram'] = 'İnstagram';
        $attributes['linkedin'] = 'Linkedin';
        $attributes['tiktok'] = 'Tiktok';
        $attributes['github'] = 'Github';
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }

}
