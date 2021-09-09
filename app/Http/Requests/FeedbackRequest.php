<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class FeedbackRequest extends BaseRequest
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
            'phone' => 'required|max:255', 
            'text' => 'required|max:1024',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }

    public function attributes()
    {
        return [
            'text' => 'Сообщение',
        ];
    }
}
