<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';


    /* INVERSE FK RELATIONSHIP */

    public function ticketDepartment()
    {
        return $this->hasMany('App\Tickets', 'department');
    }

    public function adminDepartment()
    {
        return $this->hasMany('App\Department', 'department');
    }
}
