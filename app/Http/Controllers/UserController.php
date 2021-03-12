<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        //return $user->password;
        if(!$user || !Hash::check($req->password,$user->password)){
            return "username or password does not matched";
        }else{
            $req->session()->put('user',$user);
           return redirect('/');
        }
    }
}
