<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidenceStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|numeric|max:1',
            'category' => 'required|numeric|max:10',
            'property_size' => 'required|numeric',
            'facing' => 'required|string',
            'floor_no' => 'required|numeric|max:200',
            'floor_type' => 'required|numeric|max:10',
            'dining_type' => 'required|numeric|max:5',
            'price' => 'required|numeric',
            'service_charge'  => 'nullable|numeric',
            'price_options' => 'nullable|string',
            'available_from' => 'required|numeric|max:12',
            'preferred_rental'  => 'nullable|string',
            'details' => 'nullable|string',
            'district' => 'required|numeric',
            'area' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Valid type is required',
            'category.required' => 'Valid category is required',
            'property_size.required' => 'Valid size is required',
            'facing.required' => 'Valid facing is required',
            'floor_no.required' => 'Valid floor number is required',
            'floor_type.required' => 'Valid floor type is required',
            'dining_type.required' => 'Valid dining type is required',
            'price.required' => 'Valid price is required',
            'service_charge'  => 'Valid service charge is required',
            'price_options' => 'Valid price options are required',
            'district.required' => 'Valid district is required',
            'area.required' => 'Valid area is required',
        ];
    }
}
