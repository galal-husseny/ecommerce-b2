<?php
namespace App\Http\Requests\Specifcation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSpecRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
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
            'name.*' => ['required', 'min:2', 'max:128', "unique_translation:specs,name,{$this->spec->id},id"],
        ];
    }
}
