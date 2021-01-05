<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{
    
    public function index(){
        return view("authentication.index");
    }

    public function postLogin(Request $request){
        if (Auth::attempt(['nuptk' => $request->nuptk, 'password' => $request->password])) {
            if (auth()->user()->role === "super-admin") {
                return redirect('/dashboard');
            }elseif (auth()->user()->role === "kepegawaian") {
                return redirect('/informasiKetenagaan');
            }elseif (auth()->user()->role === "adminPegawai") {
                return redirect('/informasiPegawai');
            }
        }
        return redirect('/')->with('error','NUPTK atau Password salah');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/')->with('message','Logout berhasil');
    }

}
