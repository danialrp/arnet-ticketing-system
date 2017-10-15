<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed ticket_title
 * @property mixed ticket_description
 * @property mixed priority_select
 * @property mixed status_select
 * @property mixed project_select
 */
class AdminSendTicketRequest extends FormRequest
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
            'ticket_title' => 'required|max:200',
            'ticket_description' => 'required',
            'project_select' => 'required',
            'status_select' => 'required',
            'priority_select' => 'required',
        ];
    }
}
