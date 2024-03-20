<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    
    public function index() {
        return view('auth.register');
    }

    public function registerProcess(Request $request) {

        $pass = $request->password;
        $confPass = $request->password_confirmation;

        // Check role 
        if ($request->role === "- Role -") {
            Alert::error('Role Not Selected!', 'Please select a role.');
            return Redirect::back()->withInput();
        }
        
        if ($confPass === $pass) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($confPass),
                'address' => $request->address, 
                'role' => $request->role, 
                'created_at' => now(),
            ]);
            
            if ($user) {
                Alert::success('Register Success!', 'You have successfully registered.');
                return redirect()->route('login');
            } else {
                Alert::error('Register Failed!', 'Something went wrong. Please try again.');
                return Redirect::back()->withInput();
            }
        } else {
            Alert::error('Password Mismatch', 'Password and Confirm Password do not match.');
            return Redirect::back()->withInput();
        }
    }
}
