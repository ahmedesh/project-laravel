<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
       // $this->hasOne(App\Profile); == return User::hasOne(App\Profile);
        return $this->hasOne('App\Profile' );    // $this  عائده علي ال User
        //  $this->hasOne(App\Profile);  يعني اليوزر يمتلك بروفايل واحد
    }
    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
