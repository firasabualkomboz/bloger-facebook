<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{


    public function likes(){
        return $this -> hasMany(User::Class);
    }

    public function hasAnyRole($roles){
        if(is_array($roles))
        {
            foreach($roles as $role){
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles))
            {
                return true;
            }
        }
    }

    // فحص كل role لوحدها

    public function hasRole($role){
    if($this->roles()->where('name',$role)->first())
    {
    return true;
    }
    return false;
    }


    public function roles(){
        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }

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
}