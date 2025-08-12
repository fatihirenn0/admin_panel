<?php

namespace App\Http\Requests\File;

use App\Models\ContactPeople;
use Illuminate\Foundation\Http\FormRequest;

class FileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];
        $rules["name"] = ['nullable' , 'string', 'max:255'];
        $rules['file_url'] = ['required', 'mimes:jpg,jpeg,png,webp,svg,pdf,doc,docx,xls,xlsx', 'max:5120'];


        return $rules;
    }

    public function attributes(): array
    {
        $attributes = [];
        $attributes["name"] = "Dosya Adı";
        $attributes["file_url"] = "Dosya Resmi";


        return $attributes;
    }
}
