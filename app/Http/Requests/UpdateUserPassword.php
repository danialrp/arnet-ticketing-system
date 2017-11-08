<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed old_password
 * @property mixed new_password
 */
class UpdateUserPassword extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'new_re_password' => 'required|min:6|same:new_password',
        ];
    }
}
