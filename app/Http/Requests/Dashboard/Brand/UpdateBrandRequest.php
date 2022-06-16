<?php

namespace App\Http\Requests\Dashboard\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'name.en' => ['required', 'max:32', "unique_translation:brands,name,{$this->id},id"],
            'name.ar' => ['required', 'max:32', "unique_translation:brands,name,{$this->id},id"],
            'status' => ['required', 'in:1,0'],
            'id' => ['required', 'integer', 'exists:brands,id'],
            'image' => ['nullable','max:1024','mimes:png,jpg,jpeg'],
            'width' => ['required_if:resize,yes','nullable', 'integer', 'between:50,1080'],
            'height' => ['required_if:resize,yes','nullable', 'integer', 'between:50,1080'],

        ];
    }
}
