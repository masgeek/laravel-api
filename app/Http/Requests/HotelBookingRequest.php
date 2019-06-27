<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelBookingRequest extends FormRequest
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
            'room_id' => 'required|integer',
            'start_date' => 'required',
            'end_date' => 'required',
            'customer_names' => 'required:string:max:120',
            'customer_email' => 'required:email'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'room_id.required' => 'Room is required!',
            'start_date.required' => 'Start date is required!',
            'end_date.required' => 'End date is required!',
            'customer_names.required' => 'Customer names is required!',
            'customer_email.required' => 'Customer email is required!',
        ];
    }
}
