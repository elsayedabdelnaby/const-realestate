<?php

namespace App\Http\Requests\Admin\City;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CityUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of authorize

    public function rules()
    {
        $rules = [
            'country_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.name' => ['required', Rule::unique('city_translations', 'name')->ignore($this->id, 'city_id')],
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
