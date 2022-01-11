<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = 'profile_users';
    protected $fillable = [
       'province' , 'user_id' , 'gender' , 'bio' , 'facebook',
    ];

    public function user(){
        // $this->belongsTo(App\User); == return Profile::belongsTo(App\User);
        return $this->belongsTo('App\User', 'user_id' );   // $this  عائده علي ال profile
        // user_id ممكن تضيفها وممكن لا بس افضل نضيفها
        //  $this->belongsTo(App\User);  يعني البروفايل مملوك ليوزر واحد
    }
}
