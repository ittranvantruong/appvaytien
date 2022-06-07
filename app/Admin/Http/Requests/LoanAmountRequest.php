<?php

namespace App\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanAmountRequest extends FormRequest
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
                'name' => ['required', 'max:255'],
                'sort' => ['required', 'integer']
            ];
        }else{
            return [
                'name' => 'required|max:255',
                'sort' => 'required|integer|min:0',
                'id' => ['required', 'exists:App\Models\LoanAmount,id']
            ];
        }
        
    }

    public function attributes(){
        return [
            'name' => 'Tên khoản vay',
            'sort' => 'Thứ tự'
        ];
    }

    public function messages(){
        return [
            'name.required' => ':attribute không được để trống', 
            'name.max' => ':attribute không được quá 255 ký tự', 
            'sort.required' => ':attribute không được để trống', 
            'sort.integer' => ':attribute phải là số', 
            
        ];
    }
}
