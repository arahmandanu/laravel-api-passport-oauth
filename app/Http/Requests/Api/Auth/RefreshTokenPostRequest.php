<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RefreshTokenPostRequest extends FormRequest
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
            'grant_type' => ['required', 'in:refresh_token'],
            'client_id' => ['required'],
            'client_secret' => ['required'],
            'refresh_token' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'grant_type.in' => 'Grant type not valid!'
        ];
    }
}
