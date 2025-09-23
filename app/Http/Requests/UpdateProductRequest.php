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

            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'removed_images' => 'nullable|string',

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
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $case = $this->route('case');
            $MAX_IMAGES = 5;

            $existingCount = $case->images()->count();

            $removedImages = $this->filled('removed_images')
                ? json_decode($this->input('removed_images'), true) ?? []
                : [];
            $removedCount = count($removedImages);

            $newCount = $this->hasFile('images') ? count($this->file('images')) : 0;

            $finalCount = $existingCount - $removedCount + $newCount;

            if ($finalCount <= 0) {
                $validator->errors()->add('images', __('validation.case_images.at_least_one'));
            }

            if ($finalCount > $MAX_IMAGES) {
                $validator->errors()->add('images', __('validation.case_images.max_limit', ['max' => $MAX_IMAGES]));
            }
        });
    }
}
