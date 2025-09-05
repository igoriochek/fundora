<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name_en' => 'required|string|max:100',
            'name_lt' => 'required|string|max:100',
            'name_ru' => 'required|string|max:100',
            'name_pl' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'price_en' => 'required|string|max:100',
            'price_lt' => 'required|string|max:100',
            'price_ru' => 'required|string|max:100',
            'price_pl' => 'required|string|max:100',
            'product_country_id' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_visible' => 'nullable|boolean',
            'description_en' => 'nullable',
            'description_lt' => 'nullable',
            'description_ru' => 'nullable',
            'description_pl' => 'nullable',
            'main_advantages_en' => 'nullable',
            'main_advantages_lt' => 'nullable',
            'main_advantages_ru' => 'nullable',
            'main_advantages_pl' => 'nullable'
        ];
    }
}
