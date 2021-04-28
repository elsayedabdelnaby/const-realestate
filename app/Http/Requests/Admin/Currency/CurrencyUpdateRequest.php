<?php

namespace App\Http\Requests\Admin\Currency;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurrencyUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of authorize

    public function rules()
    {
        // validation
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', Rule::unique('currency_translations', 'name')->ignore($this->id, 'currency_id'),]];
        } // end of for each

        $rules += ['symbol' => 'required|starts_with:#'];

        return $rules;

    } // end of rules

    public function messages()
    {
        return [
            'required' => 'This Field is Required',
            'symbol.starts_with' => 'Must Start with #'
        ];
    } // end of messages

} // end of request
