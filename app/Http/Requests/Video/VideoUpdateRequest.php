<?php

namespace App\Http\Requests\Video;

use App\Models\ContactPeople;
use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];
        $rules["name"] = ['nullable' , 'string', 'max:255'];
        $rules['video_url'] = ['nullable', 'mimes:mp4,mov,avi,mkv,webm,3gp,mpeg', 'max:20480'];
        $rules['rank'] = ['nullable', 'integer', 'min:0'];

        return $rules;
    }

    public function attributes(): array
    {
        $attributes = [];
        $attributes["name"] = "Dosya Adı";
        $attributes["video_url"] = "Video";
        $attributes['rank'] = 'Gösterim Sırası';

        return $attributes;
    }
}
