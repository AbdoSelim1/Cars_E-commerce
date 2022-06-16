<?php

namespace App\Http\Requests\Dashboard\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'=>['required','min:7','max:50'],
            'email'=>['required','email',"unique:admins,email,{$this->admin->id},id"],
            'image'=>['nullable','max:1024','mimes:png,jpg,jpeg'],
        ];
    }
}
