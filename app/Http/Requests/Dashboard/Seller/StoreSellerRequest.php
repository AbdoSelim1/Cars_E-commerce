<?php

namespace App\Http\Requests\Dashboard\Seller;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Admin\SellerController;

class StoreSellerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'phone' => ['required', 'regex:/^01[0125][0-9]{8}$/', 'unique:sellers'],
            'national_id'=>['required','integer','digits:14','unique:sellers'],
            'password' => ['required', 'string', "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/", 'confirmed'],
            'password_confirmation' => ['required'],
            'status'=>['required','in:'.implode(',',SellerController::AVELABLE_STATUS)],
            'email_verified_at'=>['required','in:'.implode(',',SellerController::AVELABLE_STATUS)],
            // 'image'=>['nullable','max:1024','mimes:'.implode(',',SellerController::AVAILABLE_EXTENSIONS)],
            'gender'=>['required','in:male,female'],
            // 'social_links'=>['nullable','array'],
            
        ];
    }
}
