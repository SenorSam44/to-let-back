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
            'type' => 'required|number|max:1',
            'category' => 'required|number|max:5',
            'owner_id' => 'required|number',
            'location' => 'string',
            'size' => 'required|number',
            'facing' => 'required|string',
            'floor_no' => 'required|number|max:200',
            'floor_type' => 'required|number|max:3',
            'dinning_type' => 'required|number|max:5',
            'price' => 'required|number',
            'service_charge'  => 'number',
            'price_options' => 'string',
            'available_from' => 'required|number|max:12',
            'preferred_rental'  => 'number',
            'details' => 'string',
        ];
    }
}
