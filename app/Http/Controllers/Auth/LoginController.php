<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login',[
            'title' => 'Login Simulasi Carlo',
            'name' => 'Simulasi Carlo'
         ]);
    }

    public function AuthLogin(Request $request){
        $cridentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($cridentials)){
            $request->session()->regenerate();
            return redirect()->intended(@route('dash.index'))->with('success','Login Success!!');
        }
        return back()->with('error','Login Failed!!');
    }
        public function logout(){
            auth()->logout();
            return redirect('auth/login');
        }

}

// 'distribusi_densitas' => ['required'],
//             'distribusi_komulatif' => ['required'],
//             'tag_number' => ['required'],