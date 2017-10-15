<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed status_select
 * @property mixed priority_select
 * @property mixed message_body
 */
class AdminSendMessageRequest extends FormRequest
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
            'message_body' => 'required',
            'priority_select' => 'size:1',
            'status_select' => 'size:1',
            'attachment_file' => 'max:2000|mimes:jpeg,png,bmp,gif,pdf,zip'
        ];
    }
}
