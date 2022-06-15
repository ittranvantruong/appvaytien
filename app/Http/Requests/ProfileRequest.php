<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        if($this->method() == 'PUT'){
            if($this->routeIs('profile.update.info.persional')){
                return [
                    'email' => ['nullable', 'unique:App\Models\User,email,'.$this->user()->id],
                    'identity_number' => ['nullable', 'unique:App\Models\UserInfo,identity_number,'.$this->user()->info->id],
                ];
            }else{
                return [
                    //
                ];    
            }
            
        }else{
            return [
                //
            ];    
        }
    }

    public function messages(){
        return [
            'email.unique' => 'Email đã có người sử dụng',
            'identity_number.unique' => 'Số CMND đã có người sử dụng',
        ];
    }
}
