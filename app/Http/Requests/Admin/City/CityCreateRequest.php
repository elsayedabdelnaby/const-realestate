<?php

namespace App\Http\Requests\Admin\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    } // end of authorize

    public function rules()
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.name' => ['required', Rule::unique('city_translations', 'name')],
            ];
        } // end of for each.

        $rules += ['country_id' => 'required'];

        return $rules;

    } // end of rules

    public function messages()
    {
        return [
            'required' => 'This Field is Required',
        ];
    } // end of messages

}
