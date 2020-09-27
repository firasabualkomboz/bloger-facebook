<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','user_role','role_id','user_id');
    }
}
