<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email:rfc'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    // public function messages(): array
    // {
    //     return [
    //         'name.required' => __('validations.nameRequired'),
    //         'name.string' => __('validations.nameString'),
    //         'name.max' => __('validations.nameMax'),
    //         'phone_number.required' => __('validations.phoneNumberRequired'),
    //         'phone_number.string' => __('validations.phoneNumberString'),
    //         'phone_number.max' => __('validations.phoneNumberMax'),
    //         'email.required' => __('validations.emailRequired'),
    //         'email.email' => __('validations.emailEmail'),
    //     ];
    // }
}
