<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\Santri as SeedersSantri;
use App\Models\Santri;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginview () {

        return view('login');
    }

    public function login (Request $request) {
        FacadesSession::flash('email',$request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('/')->with('success', Auth::user()->name.' Berhasil Login');
        }else{
            return redirect('login')->withError('Anda salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil Logout');
    }

    public function register () {
        return view('register');
    }

    public function create(Request $request){
        FacadesSession::flash('name',$request->name);
        FacadesSession::flash('email',$request->email);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            'email.required' => 'email harus diisi',
            'email.email' => 'Silakan masukan email yang valid',
            'email.unique' => 'email sudah pernah digunakan, email yang lain',
            'name.required' => 'nama harus diisi',
            'password.required' => 'password harus diisi',
            'password.min' => 'Minimum password yang dibuat adalah 6 karakter'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('/')->with('success', Auth::user()->name.' Berhasil Login');
        }else{
            return redirect('register')->with('error', 'Ada yang salah');
        }
    }
}
