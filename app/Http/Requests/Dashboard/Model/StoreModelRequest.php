<?php

namespace App\Http\Requests\Dashboard\Model;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ['array:en,ar'],
            'name.en' => ['required', 'max:32', 'unique_translation:models'],
            'name.ar' => ['required', 'max:32', 'unique_translation:models'],
            'date_model' => ['required', 'max:50'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'status' => ['required', 'integer', 'in:1,0'],
            'image' => ['required','max:1024','mimes:png,jpg,jpeg'],
            'width' => ['required_if:resize,yes','nullable', 'integer', 'between:50,1080'],
            'height' => ['required_if:resize,yes','nullable', 'integer', 'between:50,1080'],
        ];
    }
}
