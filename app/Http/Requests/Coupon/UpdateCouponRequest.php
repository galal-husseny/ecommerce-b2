<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCouponRequest extends FormRequest
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
            "max_usage_number_per_user" => ['sometimes', 'numeric', 'min:1'],
            "discount" => ['sometimes', 'numeric', 'min:0'],
            "max_discount_value" => ['sometimes', 'numeric', 'min:1'],
            'status' => ['sometimes', 'numeric', 'in:0,1'],
            'max_usage_number' => ['sometimes', 'numeric','gt:max_usage_number_per_user'],
            'min_order_value' => ['sometimes', 'numeric', 'min:1'],
            'start_at' => ['sometimes', 'date','after_or_equal:'. now()->format('Y-m-d')],
            'end_at' => ['sometimes', 'date','after_or_equal:'. now()->format('Y-m-d')]
        ];
    }
}
