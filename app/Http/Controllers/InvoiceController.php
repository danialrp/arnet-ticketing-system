<?php

namespace App\Http\Controllers;

use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @property InvoiceRepository InvoiceRepository
 */

class InvoiceController extends Controller
{
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->middleware('auth');

        $this->InvoiceRepository = $invoiceRepository;
    }

    public function getAllInvoices()
    {
        $userInvoices = $this->InvoiceRepository->getAllInvoices(Auth::user()->id);

        return view('invoice/all', compact('userInvoices'));
    }
}
