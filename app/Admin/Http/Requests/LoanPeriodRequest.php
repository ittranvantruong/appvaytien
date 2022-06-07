<?php

namespace App\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanPeriodRequest extends FormRequest
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
                'interest_rate' => ['required', 'numeric', 'min:0'],
                'sort' => ['required', 'integer']
            ];
        }else{
            return [
                'name' => 'required|max:255',
                'interest_rate' => ['required', 'numeric', 'min:0'],
                'sort' => 'required|integer|min:0',
                'id' => ['required', 'exists:App\Models\LoanPeriod,id']
            ];
        }
        
    }

    public function attributes(){
        return [
            'name' => 'Tên khoản vay',
            'interest_rate' => 'Lãi suất',
            'sort' => 'Thứ tự'
        ];
    }

    public function messages(){
        return [
            'name.required' => ':attribute không được để trống', 
            'name.max' => ':attribute không được quá 255 ký tự', 
            'interest_rate.required' => ':attribute không được để trống', 
            'interest_rate.numeric' => ':attribute phải là số', 
            'interest_rate.min' => ':attribute phải lớn hơn :min', 
            'sort.required' => ':attribute không được để trống', 
            'sort.integer' => ':attribute phải là số', 
            
        ];
    }
}
