<?php

namespace App\Http\Requests\Api\V1\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserShowRequest extends FormRequest
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
            'user' => ['required', 'uuid'],
        ];
    }

    public function validationData()
    {
        return array_merge($this->request->all(), [
            'user' => Route::input('user'),
        ]);
    }
}
