<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';


    /* INVERSE FK RELATIONSHIP */

    public function ticketPriority()
    {
        return $this->hasMany('App\Ticket', 'priority');
    }
}
