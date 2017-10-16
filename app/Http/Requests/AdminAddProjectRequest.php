<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed status_select
 * @property mixed user_select
 * @property mixed project_title
 * @property mixed project_note
 */
class AdminAddProjectRequest extends FormRequest
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
            'project_title' => 'required|max:200',
            'project_note' => 'max:250',
            'user_select' => 'required',
            'status_select' => 'required',
        ];
    }
}
