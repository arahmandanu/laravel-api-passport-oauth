<?php

namespace App\Http\Requests\Api\V1\Users;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserUpdateRequest extends FormRequest
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
            'user' => ['required', 'uuid'],
            'email' => ['required', 'email', "unique:App\Models\User,email," . Route::input('user') . ''],
            'name' => ['required'],
            'role' => ['in:' . implode(',', $roles->toArray())],
        ];
    }

    public function validationData()
    {
        return array_merge($this->request->all(), [
            'user' => Route::input('user'),
        ]);
    }
}
