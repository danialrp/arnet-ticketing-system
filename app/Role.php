<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';


    /* INVERSE FK RELATIONSHIP */

    public function userRole()
    {
        return $this->hasMany('App\User', 'role');
    }

}
