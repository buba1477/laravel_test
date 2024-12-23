<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'post_content' => 'string',
            'image' => 'string',
            'likes' => 'integer',
            'id_author' => 'integer',
            'category_id' => 'integer',
            'tags' => ''
        ];
    }
}
