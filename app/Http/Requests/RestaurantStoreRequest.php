<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'Description' => 'required|max:255',
            'PhoneNumber' => 'required|max:255',
            'Code' => 'required|max:255',
            'Email' => 'required|max:255|email',

        ];

    }
}
