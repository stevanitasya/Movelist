<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //

    public function loginPage(){
       return response()->view('login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required | min:6',
        ]);
   
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if($request->remember){
            Cookie::queue('mycookie', $request->email, 120);
        } else {
            Cookie::queue('mycookie', $request->email, -1);
        }

        if(Auth::attempt($credentials, true)){
            Session::put('mysession', $credentials);
            return redirect('home');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registerPage(){
        return view('register');
    }
 
    public function register(Request $request){
 
        $this->validate($request, [
            'username' => 'required | min:5 | unique:users,username',
            'email' => 'required | email',
            'password' => 'required | min:6 | alpha_num',
            'password_confirm' => 'required | same:password'
        ]);

        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
 
        DB::table('users')->insert([
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => "member"
        ]);

        return redirect('/');
    }
}
