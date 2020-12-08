<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

use Symfony\Component\HttpFoundation\Cookie;

class LoginController extends Controller
{
    public function login(){
        return view('login.login', ["create" => 0]);    
    }

   
    public function store(Request $request){
        $User = new User();

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = $request->password;

        $User->save();

        return view('login.login', ["create" => 1]);
    }

    public function viewUser(Request $request) {
        $User = new User();

        $reqEmail = $request->email;
        $reqPassword = $request->password;
    
        $Result = User::where('email', $reqEmail)->first();
    
        if(($reqEmail ===  $Result->email) && ($reqPassword === $Result->password)){

            $redirect = redirect("/contact/show/$Result->id");
            $redirect->withCookie(cookie('id', $Result->id ,10000));
            return $redirect; 
        }else {
            return "Usuário ou a senha estão incorretos";
        }
    }

}
