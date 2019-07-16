<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array pictures
 */
class HotelRequest extends FormRequest
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
            'name' => 'required:string',
            'address' => 'required:string',
            'city' => 'required:string',
            'state' => 'required:string',
            'country' => 'required:string',
            'zip_code' => 'required:string',
            'phone_number' => 'required:string:max:20',
            'email' => 'required:string',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Hotel name is required',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
            'state.required' => 'State is required',
            'country.required' => 'Country is required',
            'zip_code.required' => 'Zip code is required',
            'phone_number.required' => 'Phone number is required',
            'email.required' => 'Email is required',
            'image.required' => 'Hotel image is required',
        ];
    }
}
