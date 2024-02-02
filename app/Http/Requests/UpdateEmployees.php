<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEmployees extends FormRequest
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
        $id = $this->input('id');
        $rules = [];
        $rules['image'] = 'nullable|image';
        $rules['name'] = 'required|string';
        $rules['email'] = 'required|email|unique:users,email,' . $id;
        $rules['role_id'] = 'required|exists:roles,id';
        $rules['mobile'] = 'required|string';
        $rules['password'] = 'nullable|string';
        return $rules;
    }

    public function messages()
    {
        return [
//            'law_cases_repeater.*.stage' => translate('stage is required'),
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
