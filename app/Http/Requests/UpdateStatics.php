<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UpdateStatics extends FormRequest
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
        $rules['statistics_repeater.*'] =  'required|array';
        $rules['statistics_repeater.*.title'] =  'required|string';
        $rules['statistics_repeater.*.number'] =  'required|integer';
        $rules['law_cases_repeater.*.image'] =  'nullable|image';
        return $rules;
    }

    public function messages()
    {
        return [
            'statistics_repeater.*.title' => translate('title is required'),
            'statistics_repeater.*.number' => translate('number is required'),
            'statistics_repeater.*.image' => translate('image is required'),
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
