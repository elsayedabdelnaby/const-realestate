<?php

namespace App\Http\Requests\Admin\Property;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'city_id'               => 'required',
            'country_id'            => 'required',
            'currency_id'           => 'required',
            'property_type_id'      => 'required',
            'property_status_id'    => 'required',
            'agency_id'             => 'required',
            'rooms'                 => 'required|numeric|min:1',
            'bedrooms'              => 'required|numeric',
            'bathrooms'             => 'required|numeric',
            'garages'               => 'required|numeric',
            'plot_area'             => 'required|numeric',
            'construction_area'     => 'required|numeric',
            'price'                 => 'required|numeric',
            'image'                 => 'image|mimes:jpg,jpeg,png,svg',
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules += [
                $locale . '.name' => ['required', Rule::unique('property_translations', 'name')->ignore($this->id, 'property_id')],
            ];
        } // end of for each

        return $rules;
    } // end of rules


}
