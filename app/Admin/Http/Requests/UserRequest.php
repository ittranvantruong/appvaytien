<?php

namespace App\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if($this->method() == 'POST'){
            return [
                'fullname' => ['required', 'max:255'],
                'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone'],
                'password' => ['required', 'max:255', 'confirmed'],
                'identity_number' => ['required', 'max:255'],
                'education' => ['required', 'max:255'],
                'personal_income' => ['required', 'max:255'],
                'purpose' => ['required', 'max:255'],
                'name_owner' => ['required', 'max:255'],
                'identity_number_b' => ['required', 'max:255'],
                'name' => ['required', 'max:255'],
                'number' => ['required', 'max:255']
            ];
        }elseif($this->method() == 'PUT'){
            return [
                'id' => ['required', 'exists:App\Models\User,id'],
                'fullname' => ['required', 'max:255'],
                'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/', 'unique:App\Models\User,phone,'.$this->id],
                'password' => ['max:255', 'confirmed'],
                'identity_number' => ['required', 'max:255'],
                'education' => ['required', 'max:255'],
                'personal_income' => ['required', 'max:255'],
                'purpose' => ['required', 'max:255'],
                'name_owner' => ['required', 'max:255'],
                'identity_number_b' => ['required', 'max:255'],
                'name' => ['required', 'max:255'],
                'number' => ['required', 'max:255']
            ];
        }
    }
}
