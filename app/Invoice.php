<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';


    /* FK RELATIONSHIP */

    public function ownerInvoice()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function statusInvoice()
    {
        return $this->belongsTo('App\Status', 'status');
    }

    public function ticketInvoice()
    {
        return $this->belongsTo('App\Ticket', 'ticket_id');
    }
}
