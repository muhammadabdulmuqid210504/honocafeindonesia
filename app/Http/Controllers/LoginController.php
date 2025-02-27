<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }

}
