<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
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
            'grant_type' => ['required', 'in:password'],
            'username' => ['required'],
            'password' => ['required'],
            'client_id' => ['required'],
            'client_secret' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'grant_type.in' => 'Grant type not valid!',
        ];
    }
}
