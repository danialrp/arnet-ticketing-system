<?php

namespace App\Repositories;

use App\Http\Requests\AdminAddInvoiceRequest;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

/**
 * Class InvoiceRepository
 *
 * @package \App\Repositories
 */
class InvoiceRepository
{
    public function getUserInvoices($userId)
    {
        $allInvoices = DB::table('invoices')
            ->LeftJoin('tickets', 'invoices.ticket_id', 'tickets.id')
            ->join('statuses', 'invoices.status', 'statuses.id')
            ->where('invoices.owner', $userId)
            ->where('invoices.deleted', 0)
            ->select(
                'invoices.*',
                'invoices.id as invoiceId',
                'invoices.description as invoiceDescription',
                'statuses.fa_name as statusFaName',
                'statuses.color_code as statusColorCode',
                'tickets.id as ticketId',
                'tickets.title as ticketTitle',
                'tickets.reference_number as TicketReferenceNumber'
            )
            ->orderBy('invoices.status', 'desc')
            ->paginate(10);

        return $allInvoices;
    }

    public function getAllInvoices()
    {
        $allInvoices = DB::table('invoices')
            ->join('users', 'users.id', 'invoices.owner')
            ->join('statuses', 'statuses.id', 'invoices.status')
            ->select(
                'invoices.id as invoice_id',
                'invoices.reference_number as invoice_ref_number',
                'invoices.amount as invoice_amount',
                'invoices.note as invoice_note',
                'invoices.created_fa as invoice_date',
                'invoices.paid_fa as invoice_paid',
                'users.id as owner_id',
                'users.fname as owner_fname',
                'users.lname as owner_lname',
                'statuses.fa_name as status_name',
                'statuses.color_code as status_color_code'
            )
            ->where('invoices.deleted', 0)
            ->orderBy('invoices.created_fa', 'desc')
            ->get();

        return $allInvoices;
    }

    public function deleteInvoice($invoiceId)
    {
        DB::table('invoices')
            ->where('id', $invoiceId)
            ->update([
                'deleted' => 1,
                'updated_fa' => Verta::now(),
                'updated_at' => Carbon::now()
            ]);
    }

    public function getAllUsers()
    {
        $allUsers = DB::table('users')
            ->where('role', 1)
            ->select('id', 'fname', 'lname')
            ->get();

        return $allUsers;
    }

    public function getUserTickets($userId)
    {
        $userTickets = DB::table('tickets')
            ->where('sender', $userId)
            ->pluck('reference_number', 'id');

        return $userTickets;
    }

    public function generateReferenceNumber()
    {
        $referenceNumber = sprintf("%04d", mt_rand(1, 9999));
        return $referenceNumber;
    }

    public function insertNewTicket(AdminAddInvoiceRequest $adminAddInvoiceRequest)
    {
        $refNumber = $this->generateReferenceNumber();

        DB::table('invoices')
            ->insert([
                'reference_number' => $refNumber,
                'amount' => $adminAddInvoiceRequest->invoice_amount,
                'owner' => $adminAddInvoiceRequest->user_select,
                'ticket_id' => $adminAddInvoiceRequest->ticket_select,
                'status' => 7,
                'description' => $adminAddInvoiceRequest->invoice_description,
                'created_fa' => Verta::now(),
                'created_at' => Carbon::now()
            ]);
    }

    public function invoicePaid($invoiceId)
    {
        DB::table('invoices')
            ->where('id', $invoiceId)
            ->update([
                'status' => 6,
                'paid_fa' =>Verta::now(),
                'updated_fa' => Verta::now(),
                'updated_at' => Carbon::now()
            ]);
    }

}