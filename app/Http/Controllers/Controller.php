<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        }else{
            return redirect('login');
        }
   
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function profile(){
        $data['user'] = auth()->user();
        $data['pass'] = auth()->user()->password;
        return view('profile.index',$data);
    }

    public function update(Request $request, $id){

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $dataUser =  $request->except('_method', '_token');

        if($dataUser['password'] != null){
            $dataUser['password'] = bcrypt($dataUser['password']);
            User::where('id', '=', $id)->update($dataUser);
            return redirect('logout');
        }
        return response()->json($dataUser,200);
    }
}
