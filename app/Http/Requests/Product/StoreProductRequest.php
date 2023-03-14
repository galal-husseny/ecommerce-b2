<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('seller')->check() || Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['required', 'array:ar,en'],
            'name.*' => ['required', 'min:2', 'max:128'],
            "purchase_price" => ['required', 'numeric', 'min:1', 'max:99999999.99'],
            "sale_price" => ['required', 'numeric', 'min:1', 'max:99999999.99'],
            "quantity" => ['required', 'integer', 'min:1', 'max:999'],
            "status" => ['required', 'in:0,1'],
            "category_id" => ['required', 'integer', 'exists:categories,id'],
            "description" => ['required', 'array:ar,en'],
            'description.*' => ['nullable', 'min:2', 'max:1000000'],
            "image" => ['required', 'mimes:png', 'max:1024'],
        ];
    }
}
