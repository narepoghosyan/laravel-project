<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenancy extends FormRequest
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
            'tenant_id'   => 'required|numeric',
            'property_id' => 'required|numeric|exists:properties,id',
            'start_date'  => 'required',
            'end_date'    => 'required',
            'rent'        => 'required',
        ];
    }
}
