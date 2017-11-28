<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed telegram
 */

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /* FK RELATIONSHIP */

    public function userRole()
    {
        return $this->belongsTo('App\Role', 'role');
    }


    /* INVERSE FK RELATIONSHIP */

    public function ticketSender()
    {
        return $this->hasMany('App\Ticket', 'sender');
    }

    public function invoiceOwner()
    {
        return $this->hasMany('App\Invoice', 'owner');
    }

    public function contentOwner()
    {
        return $this->hasMany('App\Content', 'owner');
    }

    public function projectOwner()
    {
        return $this->hasMany('App\Project', 'owner');
    }
}
