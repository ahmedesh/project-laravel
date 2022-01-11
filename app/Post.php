<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at']; // soft deleted

    protected $fillable = [
        'user_id' , 'title' , 'description' , 'photo' , 'slug',  // دول اللي هضيفهم فالداتابيز لما ادخل  داتا
    ];

    //    one to many
    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    // many to many
    public function tags() {

        return $this->belongsToMany('App\Tag');   // $this عائده علي ال Post

    }
}
