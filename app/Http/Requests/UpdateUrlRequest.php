<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUrlRequest extends FormRequest
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
            'url_id' => ['required'],
            'destination' => ['required', 'unique:urls', 'url', 'active_url'],
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'destination.required' => 'The url is required',
            'destination.url' => 'The url is not valid',
            'destination.unique' => 'The url has already been shortened.',
            'destination.active_url' => 'The url does not exist.',
        ];
    }  
}
