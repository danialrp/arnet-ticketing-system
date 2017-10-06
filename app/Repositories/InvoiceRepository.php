<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

/**
 * Class InvoiceRepository
 *
 * @package \App\Repositories
 */
class InvoiceRepository
{
    public function getAllInvoices($userId)
    {
        $allInvoices = DB::table('invoices')
            ->LeftJoin('tickets', 'invoices.ticket_id', 'tickets.id')
            ->join('statuses', 'invoices.status', 'statuses.id')
            ->where('owner', $userId)
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

}