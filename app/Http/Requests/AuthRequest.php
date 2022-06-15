<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        //
        if($this->method() == 'POST'){
            if($this->routeIs('post.login')){
                return [
                    'phone' => 'required',
                    'password' => 'required',
                ];
            }else{
                return [];
            }
        }else{
            return [];
        }
    }

    public function attributes(){
        return [
            'phone' => 'Số điện thoại',
            'password' => 'Mật khẩu',
        ];
    }
    public function messages(){
        return [
            'phone.required' => ':attribute không được để trống',
            'password.required' => ':attribute không được để trống'
        ];
    }
}
