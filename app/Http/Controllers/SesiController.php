<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() {
        return view('auth/login');
    }

    function login(Request $request){
        $request->validate([
            'nomor'=>'required',
            'password'=>'required'
        ],[
            'nomor.required'=>'Nomor wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin =[
            'nomor'=>$request->nomor,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'petugas'){
                return redirect('admin_master');
            } elseif(Auth::user()->role == 'pasien'){
                return redirect('backend/pengguna');
            }
        }else{
            return redirect('')->withErrors('Nomor dan password yang dimasukkan salah')->withInput();
        }
    }


}
