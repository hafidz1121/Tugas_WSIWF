<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        
        return view('pages.user', [
            'users' => $users
        ]);
    }

    public function store() {
        return view('pages.user_add');
    }

    public function create(Request $request) {
        $users = User::all();

        $pass = $request->password;
        $confPass = $request->password_confirmation;

        
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'address' => 'required',
                'role' => 'required',
            ]);
      
            // Check role 
            if ($request->role === "- Role -") {
                Alert::error('Role Not Selected!', 'Please select a role.');
                return Redirect::back()->withInput();
            }
    
            if ($confPass === $pass) {
                $userData = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($confPass),
                    'address' => $request->address, 
                    'role' => $request->role, 
                    'created_at' => now(),
                ];

                User::create($userData);
                Alert::success('Success!', 'Data User Successfully Save.');
                return redirect()->route('user', [
                    'users' => $users
                ]);
            } else {
                Alert::error('Password Mismatch', 'Password and Confirm Password do not match.');
                return Redirect::back()->withInput();
            }
        } catch (ValidationException $ex) {    
            Alert::error('Failed!', $ex->getMessage());
            return Redirect::back()->withInput();     
        } catch (QueryException $ex) {    
            Alert::error('Failed!', 'Something went wrong. ' + $ex);
            return Redirect::back()->withInput();     
        }
    }

    public function edit($id) {
        $users = User::find($id);

        return view('pages.user_update', [
            'users' => $users 
        ]);
    }


    public function update($id, Request $request) {       
        try {
            $request->validate([
                'name' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($id),
                ],
                'password' => 'nullable',
                'address' => 'required',
                'role' => 'required',
            ]);

            $pass = $request->password;
            $confPass = $request->password_confirmation;

            if ($request->role === "- Role -") {
                Alert::error('Role Not Selected!', 'Please select a role.');
                return Redirect::back()->withInput();
            }

            $users = User::find($id);
    
            $users->name = $request->name;
            $users->email = $request->email;
            $users->address = $request->address;
            $users->role = $request->role;

            if ($request->filled('password')) {
                if ($confPass === $pass) {
                    $users->password = Hash::make($request->password);
                } else {
                    Alert::error('Password Mismatch', 'Password and Confirm Password do not match.');
                    return Redirect::back()->withInput();
                }
            }

            $users->update();

            Alert::success('Success!', 'Data User Successfully Update.');
            return redirect()->route('user', [
                'users' => $users
            ]);
        } catch (ValidationException $ex) {    
            Alert::error('Failed!', $ex->getMessage());
            return Redirect::back()->withInput();     
        } catch (QueryException $ex) {    
            Alert::error('Failed!', 'Something went wrong. ' + $ex);
            return Redirect::back()->withInput();     
        }
    }

    public function delete($id) {
        $users = User::find($id);

        Alert::success('Success!', 'Data User Successfully Delete.');
        $users->delete();
        
        return redirect()->route('user');
    }
}
