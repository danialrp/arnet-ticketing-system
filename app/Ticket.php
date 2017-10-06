<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';


    /* FK RELATIONSHIP */

    public function userSender()
    {
        return $this->belongsTo('App\User', 'sender');
    }

    public function departmentTicket() {
        return $this->belongsTo('App\Department', 'department');
    }

    public function projectTicket()
    {
        return $this->belongsTo('App\Project', 'project');
    }

    public function statusTicket()
    {
        return $this->belongsTo('App\Status', 'status');
    }

    public function priorityTicket()
    {
        return $this->belongsTo('App\Priority', 'priority');
    }


    /* INVERSE FK RELATIONSHIP */

    public function contentTicket()
    {
        return $this->hasMany('App\Content', 'ticket_id');
    }

    public function invoiceTicket()
    {
        return $this->hasOne('App\Invoice', 'ticket_id');
    }
}
