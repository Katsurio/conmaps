<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'first_name' => 'required|alpha|max:45',
            'last_name' => 'required|alpha|max:45',
            'email' => 'required|email',
            'phone' => 'numeric|digits:10|nullable',
            'birthday' => 'date_format:"Y-m-d"|nullable',
            'address' => 'required_with:city,state,zip|string',
            'city' => 'required_with:address|string|nullable',
            'state' => 'required_with:address|alpha|max:2|nullable',
            'zip' => 'required_with:address|numeric|digits:5|nullable'
        ];
    }
}
