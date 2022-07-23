<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteIdentityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'logo' => 'mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:2048',
            'favicon' => 'mimes:jpg,jpeg,png,ico,JPG,JPEG,PNG,ICO|max:2048',
            'version' => ['required'],
            'facebook' => ['url'],
            'twitter' => ['url'],
            'instagram' => ['url'],
            'youtube' => ['url']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [

        ];
    }
}
