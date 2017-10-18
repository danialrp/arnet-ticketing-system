<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed invoice_amount
 * @property mixed user_select
 * @property mixed ticket_select
 * @property mixed invoice_description
 */
class AdminAddInvoiceRequest extends FormRequest
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
            'invoice_amount' => 'required|numeric',
            'invoice_description' => 'max:250',
            'user_select' => 'required'
        ];
    }
}
