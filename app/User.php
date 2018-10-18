<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    public function role () {
        return $this->hasOne('App\Model\Role');
    }

    public function accounts ()
    {
        return $this->hasMany('App\Model\Account');
    }

    public function bookings ()
    {
        return $this->hasMany('App\Model\Booking');
    }

    public function cards ()
    {
        return $this->hasMany('App\Model\Card');
    }

    public function ratings ()
    {
        return $this->hasMany('App\Model\Ratings');
    }

}
