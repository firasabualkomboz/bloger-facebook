<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class RegistrationController extends Controller
{
        public function create(){
        return view ('register');
        }


        public function store(Request $request){

        $user = new User;
        $user->name =$request ->name;
        $user->email =$request ->email; // الي جاي من الريكوست
        $user->password =bcrypt($request ->password);

        $user ->save(); //حفط البيانات

        //add role
        $user->roles()->attach(Role::where('name','User')->first());
        //ثم تحوله لتسجيل للدخول لليوزر الي تم انشاؤه

        auth()->login($user);

        return redirect('/posts');


        }

}
