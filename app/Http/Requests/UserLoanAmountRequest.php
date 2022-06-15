<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoanAmountRequest extends FormRequest
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
            'loan_amount' => ['required'],
            'loan_period' => ['required'],
            'interest_rate' => ['required']
        ];
    }

    public function messages(){
        return [
            'loan_amount.required' => 'Không đủ điểu kiện để đăng ký',
            'loan_period.required' => 'Không đủ điểu kiện để đăng ký',
            'interest_rate.unique' => 'Không đủ điểu kiện để đăng ký',
        ];
    }
}
