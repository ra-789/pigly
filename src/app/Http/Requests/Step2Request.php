<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step2Request extends FormRequest
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
            'current_weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,4}(\.\d)?$/',
            ],
            'target_weight' => [
                'required',
                'numeric',
                'regex:/^\d{1,4}(\.\d)?$/',
            ],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'current_weight.required' => '現在の体重を入力してください',
            'current_weight.numeric'  => '数値を入力してください',
            'current_weight.regex'    => '4桁までの数字で、小数点以下は1桁までで入力してください',

            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric'  => '数値を入力してください',
            'target_weight.regex'    => '4桁までの数字で、小数点以下は1桁までで入力してください',
        ];
    }
}
