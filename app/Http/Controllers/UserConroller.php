<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserConroller extends Controller
{


    public function follow($following_id){
        $following = User::find($following_id);
        auth()->user()->followings()->attach($following);
        return redirect('/');
    }

    public function unfollow($following_id){
        $following = User::find($following_id);
        auth()->user()->followings()->detach($following);
        return redirect('/');
    }

    public function registerform(){
        if(auth()->check()){
            return redirect('/');
        }
        return view('auth.register');
    }

    public function loginform(){
        if(auth()->check()){
            return redirect('/');
        }
        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);
  
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function auth(Request $request){
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        {
            return redirect('/');
        }
        else{
          return redirect('/login')->with([
            'error'=>'invalid!!!!!!!!!!!'
          ]);
        }
    }

    public function logout(){
       auth()->logout();
       return redirect('/');
}



}

