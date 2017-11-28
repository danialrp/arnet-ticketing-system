<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed id
 */
class UpdateAdminProfileRequest extends FormRequest
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
            'email' => 'required|max:60|email|unique:admins,email,'.Auth::guard('web_admin')->user()->id, /* Ignore Email Address of Current Admin Id*/
            'password' => '',
            'phone' => 'required|numeric',
            'note' => 'max:120',
            'telegramNumber' => 'max:15',
            'telegramUsername' => 'max:35',
            'telegramChatId' => 'max:999999999999999|integer|nullable'
        ];
    }
}
