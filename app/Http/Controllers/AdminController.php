<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {

            return view('Admin.dashboard');
    }
    public function login()
    {
     return view('Admin.login');   
    }


    public function  check(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]); 

        
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return to_route('admin.home');
        }else{

            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
  
}
