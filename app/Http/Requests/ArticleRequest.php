<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        if ($this->requestUri != '/admin/articles/update') {
            $this->merge([
                'user_id' => 1,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'string|required|max:255|min:3',
            'content' => 'required',
        ];
        if ($this->requestUri == '/admin/articles/update') {
            $rules['id'] = 'integer|required';
        } else {
            $rules['user_id'] = 'integer|required';
        }
        return $rules;
    }
}
