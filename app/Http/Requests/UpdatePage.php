<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UpdatePage extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $rules['name'] = 'required|max:255';
        $rules['secondary_title'] = 'required|max:255';
        $rules['description'] = 'required|string';
        $rules['slug'] = 'required|max:255';
        $rules['keywords'] = 'required|max:255';
        $rules['image'] = 'nullable|image';
        return $rules;
    }

    public function messages()
    {
        return [
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessage = $validator->errors()->first();

        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => __($errorMessage),
        ], 422));
    }
}
