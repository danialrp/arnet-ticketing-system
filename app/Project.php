<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';


    /* FK RELATIONSHIP */

    public function ownerProject()
    {
        return $this->belongsToMany('APP\User', 'owner');
    }

    public function statusProject()
    {
        return $this->belongsToMany('App\Status', 'status');
    }


    /* INVERSE FK RELATIONSHIP */

    public function ticketProject()
    {
        return $this->hasMany('App\Ticket', 'project');
    }
}
