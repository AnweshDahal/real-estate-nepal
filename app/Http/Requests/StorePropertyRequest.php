<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'locality_id' => ['required', 'string'],
            'property_category' => ['required', 'string'],
            'property_name' => ['required', 'string'],
            'listing_type' => ['required', 'string'],
            'address' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'string'],
            'thumbnail' => ['required', 'mimes:jpg,jpeg,bmp,png'],
            'property_size' => ['required', 'string']
        ];
    }
}
