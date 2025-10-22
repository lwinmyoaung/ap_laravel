<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // ture ပေးထားရမယ်
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
            'name' => 'required|unique:posts',
            'description' => 'required|max:255',
            'category_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'description.required' => 'A description is required',
        ];
    }
}
