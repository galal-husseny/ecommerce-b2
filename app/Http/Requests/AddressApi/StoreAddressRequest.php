<?php

namespace App\Http\Requests\AddressApi;

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
            'notes' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:WORK,HOME'],
            'region_id' => ['required', 'integer', 'exists:regions,id'],
        ];
    }

    public function messages()
    {
        return [
            'region_id.required' => __('general.errors.region_id_required'),
            'region_id.integer' => __('general.errors.region_id_integer'),
            'region_id.exists' => __('general.errors.region_id_exists'),

        ];
    }
}
