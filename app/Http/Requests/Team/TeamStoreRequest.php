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

        $rules["name"] = ['required', 'string', 'max:255'];
        $rules["email"] = ['nullable', 'email', 'string', 'max:255'];
        $rules["telephone"] = ['nullable', 'string'];

        foreach ($locales as $index => $locale) {
            $rules["job.$locale->locale"] = ['nullable', 'string'];
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
        $attributes["name"] = "Ekip Adı";
        $attributes["email"] = "E-Posta Adresi";
        $attributes["telephone"] = "Telefon";
        foreach ($locales as $locale) {
            $code = $locale->locale;
            $lang = $locale->language;

            $attributes["job.$code"] = "Meslek ($lang)";
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
