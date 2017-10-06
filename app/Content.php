<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';


    /* FK RELATIONSHIP */

    public function ticketContent()
    {
        return $this->belongsTo('App\Ticket', 'ticket_id');
    }

    public function ownerContent()
    {
        return $this->belongsTo('App\User', 'owner');
    }


    /* INVERSE FK RELATIONSHIP */

    public function attachmentContent()
    {
        return $this->hasMany('App\Attachment', 'message_id');
    }
}
