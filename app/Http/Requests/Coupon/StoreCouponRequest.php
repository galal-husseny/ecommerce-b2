<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCouponRequest extends FormRequest
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
            'code' => ['required', 'unique:coupons,code'],
            "max_usage_number_per_user" => ['required', 'numeric', 'min:1'],
            "discount" => ['required', 'numeric', 'min:0', 'max:100'],
            "max_discount_value" => ['required', 'numeric', 'min:1', ],
            'status' => ['required', 'numeric', 'in:0,1'],
            'max_usage_number' => ['required', 'numeric','gt:max_usage_number_per_user'],
            'min_order_value' => ['required', 'numeric', 'min:1'],
            'start_at' => ['required', 'date','after_or_equal:'. now()->format('Y-m-d')],
            'end_at' => ['required', 'date','after_or_equal:'. now()->format('Y-m-d')]

        ];
    }
}
