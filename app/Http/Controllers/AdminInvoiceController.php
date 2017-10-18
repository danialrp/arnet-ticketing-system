<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAddInvoiceRequest;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * @property InvoiceRepository InvoiceRepository
 */
class AdminInvoiceController extends Controller
{
    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->middleware('admin_auth');

        $this->InvoiceRepository = $invoiceRepository;
    }

    public function showAllInvoices()
    {
        $allInvoices = $this->InvoiceRepository->getAllInvoices();

        return view('admin_invoice.all-invoice', compact('allInvoices'));
    }

    public function deleteInvoice($invoiceId)
    {
        $this->InvoiceRepository->deleteInvoice($invoiceId);

        Session::flash('message', 'فاکتور مورد نظر با موفقیت حذف گردید!');

        return redirect()->back();
    }

    public function showNewInvoice()
    {
        $allUsers = $this->InvoiceRepository->getAllUsers();

        return view('admin_invoice.new-invoice', compact([
            'allUsers'
        ]));
    }

    public function newInvoice(AdminAddInvoiceRequest $adminAddInvoiceRequest)
    {
        $this->InvoiceRepository->insertNewTicket($adminAddInvoiceRequest);

        Session::flash('message', 'فاکتور جدید با موفقیت صادر گردید!');

        return redirect()->back();
    }

    public function getAjaxTicket($userId)
    {
        $userTickets = $this->InvoiceRepository->getUserTickets($userId);

        return response()->json($userTickets);
    }

    public function paidInvoice($invoiceId)
    {
        $this->InvoiceRepository->invoicePaid($invoiceId);

        Session::flash('message', 'وضعیت فاکتور به "پرداخت شده" تغییر کرد!');

        return redirect()->back();
    }
}
