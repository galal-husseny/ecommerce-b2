<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
        return [
            'street' => ['required', 'string', 'between:4,255'],
            'building' => ['required', 'string', 'between:1,255'],
            'floor' => ['required', 'string', 'between:1,255'],
            'flat' => ['nullable', 'string', 'between:1,255'],
            'type' => ['required', 'string', 'in:HOME,WORK'],
            'notes' => ['nullable', 'string', 'max:255'],
            'region_id' => ['required', 'integer', 'exists:regions,id'],
            'user_id' =>  ['required', 'integer', 'exists:users,id'],
        ];
    }
}
