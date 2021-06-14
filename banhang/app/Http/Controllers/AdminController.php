<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->to('admin/home');
        }
        else{
            return view('login');
        }
        
    }
    public function postlogin(Request $request){
        $remember=$request->has('remember') ? true : false;
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))   {
            return redirect()->to('admin/home');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->to('admin');
    }
}
