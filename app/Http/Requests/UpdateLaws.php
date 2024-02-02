<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UpdateLaws extends FormRequest
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
        $rules['title'] = 'required|max:255';
        $rules['category_id'] = 'required|integer|exists:categories,id';
        $rules['description_summernote'] = 'required|string';
        $rules['summary_link'] = 'nullable|file';
        $rules['full_link'] = 'nullable|file';
        $rules['image'] = 'nullable|file|max:10000';
        $rules['law_cases_repeater.*'] =  'required|array';
        $rules['law_cases_repeater.*.stage'] =  'required|exists:stages,id';
        $rules['law_cases_repeater.*.date'] =  'required|string';
        $rules['law_cases_repeater.*.description'] =  'required|string';
        $rules['law_cases_repeater.*.complete'] =  'nullable|array';
        return $rules;
    }

    public function messages()
    {
        return [
            'law_cases_repeater.*.stage' => translate('stage is required'),
            'law_cases_repeater.*.date' => translate('stage date is required'),
            'law_cases_repeater.*.description' => translate('stage description is required'),
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
