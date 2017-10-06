<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';


    /* INVERSE FK RELATIONSHIP */

    public function ticketStatus()
    {
        return $this->hasMany('App\Ticket', 'status');
    }

    public function invoiceStatus()
    {
        return $this->hasMany('App\Invoice', 'status');
    }

    public function projectStatus()
    {
        return $this->hasMany('App\Project', 'status');
    }
}
