<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'title_en' => 'required|string|max:100',
            'title_lt' => 'required|string|max:100',
            'title_ru' => 'required|string|max:100',
            'title_pl' => 'required|string|max:100',
            'description_en' => 'nullable',
            'description_lt' => 'nullable',
            'description_ru' => 'nullable',
            'description_pl' => 'nullable',
            'page_id' => 'required|integer'
        ];
    }
}
