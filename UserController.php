<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function profilePage(){
        $users = Auth::user();
        return view('profile', ['users' => $users]);
    }

    public function profile(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phoneNumber' => 'required | min:5 | max:13'
        ]);

        DB::table('users')->where('id', Auth::user()->id)
        ->update([
            'username' => $request->username,
            'email' => $request->email,
            'dob' => $request->dob,
            'phoneNumber' => $request->phoneNumber
        ]);

        return redirect('profile');
    }

    public function modal(Request $request){
        
        DB::table('users')->where('id', Auth::user()->id)
        ->update(['image' => $request->image]);

        return redirect('profile');
    }
}
