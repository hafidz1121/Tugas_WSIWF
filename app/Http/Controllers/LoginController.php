<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $user = Auth::user();

            return view('dashboard', [
                'nama' => $user->name,
                'role' => $user->role,
            ]);
        } else {
            return view('auth.login');
        }
    }

    public function loginProcess(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            Alert::success('Login Success!', 'You have successfully Login.');
            return redirect()->route('dashboard');
        } else {
            Alert::error('Login Failed!', 'Maybe your email or password was wrong, please try again.');
            return Redirect::back()->withInput();
        }
    }
    
    public function logout() {
        Auth::logout();

        return view('auth.login');
    }
}
