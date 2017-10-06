<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //Mass assignable attributes
    protected $fillable = [
        'name', 'email', 'password',
    ];

    //hidden attributes
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $table = 'admins';

    /* INVERSE FK RELATIONSHIP */

    public function departmentAdmin()
    {
        return $this->belongsTo('App\Department', 'department');
    }
}
