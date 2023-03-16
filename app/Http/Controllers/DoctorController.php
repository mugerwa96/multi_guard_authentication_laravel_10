<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
        // dashbord
        
        public function login()
        {
             return view('doctor.login');
        }
        public function home()
        {
            return view('doctor.dashboard');
        }

        // public check
        public function check(Request $request)
        {
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|string'
            ]);
            $email=$request->email;
            $password=$request->password;
            if(Auth::guard('doctor')->attempt(['email'=>$email,'password'=>$password]))
            {
                return to_route('doctor.home');
            }else{
                return to_route('doctor.login');
            }
        }
        
                    public function logout()
                    {
                        Auth::guard('doctor')->logout();
                    }
}
