<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'postcode' => 'required| size:8',
            'address' => 'required',
            'opinion' => 'required |max:120',
        ];
    }

    public function messages() 
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'postcode.size' => 'ハイフン含め8文字で入力してください',
            'address.required' => '住所を入力してください',
            'building_name.required' => '建物名を入力してください',
            'opinion.required' => 'ご意見をお願いいたします',
            'opinion.max' => 'ご意見は120文字以内で入力してください',
        ];
    }
}
