<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //one many كل لايم ع بوست
    //  وكل بوست اكتر من لايك


    public function post(){
        return $this -> belongsTo(Post::Class);
    }

    public function user(){
        return $this -> belongsTo(User::Class);
    }

}
