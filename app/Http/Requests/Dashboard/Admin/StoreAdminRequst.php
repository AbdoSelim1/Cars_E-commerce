<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequst extends FormRequest
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
            'name'=>['required','string','between:5,50'],
            'email'=>['required','email','unique:admins'],
            'password'=>['required','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'password_confirm'=>['required'],
            'email_verified_at'=>['required','integer','in:0,1'],
            'image'=>['nullable','max:1024'],
            'role_id'=>['required','integer','exists:roles,id']
        ];
    }
}
