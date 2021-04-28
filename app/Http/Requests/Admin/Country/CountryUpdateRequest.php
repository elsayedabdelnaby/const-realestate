<?php

namespace App\Http\Requests\Admin\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of authorize

    public function rules()
    {
        $rules = [
        'image' => 'mimes:jpg,jpeg,png,svg',
    ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.name' => ['required', Rule::unique('country_translations', 'name')->ignore($this->id, 'country_id')],
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
