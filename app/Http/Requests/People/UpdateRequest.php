<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'text' => 'required|string',
            'file.*' => ['file', 'mimes:pdf,docx,doc,jpg,jpeg,png,xls,xml,xlsx,txt', 'max:2048']
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Поле "title" обязательно для заполнения',
            'text.required' => 'Поле "text" обязательно для заполнения',
        ];
    }
}
