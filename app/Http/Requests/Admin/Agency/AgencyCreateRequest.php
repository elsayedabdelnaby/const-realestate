<?php

namespace App\Http\Requests\Admin\Agency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgencyCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'email' => 'required|unique:agencies',
            'image' => 'required|image',
            'office_number' => 'required|numeric',
            'mobile' => 'required|numeric',
        ] ;

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.name' => ['required', Rule::unique('agency_translations', 'name')],
                // $locale . '.description' => 'required',
            ];
        } // end of for each

        return $rules;

    } // end of rules

    public function messages()
    {
        return [
            'required' => 'This Field is Required',
        ];
    } // end of messages
}
