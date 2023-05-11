<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        return view('auth.login');    
    }

    public function login(AuthRequest $auth){
        $credentials = $auth->validated();
        if(Auth::attempt($credentials)){
            $auth->session()->regenerate();
            return redirect()->intended(route('admin.articles.index'));
        }
        return back()->withErrors([
            'email' => 'error'
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return to_route('login')->with('success','vous etes deconnecter');
    }
}
