<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $user = $this->route('user');
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id],
            'phone' => ['required', 'regex:/^01[0125][0-9]{8}$/', 'unique:users,phone,'. $user->id],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }
}
