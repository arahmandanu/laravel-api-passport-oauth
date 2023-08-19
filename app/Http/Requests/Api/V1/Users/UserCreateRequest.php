<?php

namespace App\Http\Requests\Api\V1\Users;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        $roles = Role::all()->pluck('name');

        return [
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'name' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required'],
            'role' => ['required', 'in:'.implode(',', $roles->toArray())],
        ];
    }
}
