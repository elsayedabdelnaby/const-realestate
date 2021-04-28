<?php

namespace App\Http\Requests\Admin\PropertyType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyTypeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    } // end of authorize

    public function rules()
    {
        $rules = [];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', Rule::unique('property_type_translations', 'name')->ignore($propertyType->id, 'property_type_id')]];
        }//end of for each

        return $rules;

    } // end of rules

    public function messages()
    {
        return [
            'required' => 'This Field is Required',
        ];
    } // end of messages

} // end of Request

