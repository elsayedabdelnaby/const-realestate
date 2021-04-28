<?php

namespace App\Http\Requests\Admin\Feature;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeatureCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of authorize

    public function rules()
    {
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', Rule::unique('feature_translations', 'name')]];
        } // end of for each

        return $rules;

    } // end of rules

    public function messages()
    {
        return [
            'required' => 'This Field is Required',
        ];
    } // end of messages

} // end of Request
