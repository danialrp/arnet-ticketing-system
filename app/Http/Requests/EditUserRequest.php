<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed id
 */
class EditUserRequest extends FormRequest
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
            'fname' => 'required|max:40',
            'lname' => 'required|max:50',
            'email' => 'required|max:60|email|unique:users,email,'.$this->id,
            'password' => '',
            'phone' => 'required|numeric',
            'note' => 'max:120'
        ];
    }
}
