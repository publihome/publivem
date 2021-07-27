<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function login(){
        return view('login');
    }

    public function validate(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $req = $request->except('_token');
        if(Auth::attempt($req)){
            request()->session()->regenerate();
            return redirect('dashboard');
        }
        return redirect('login');
   
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
