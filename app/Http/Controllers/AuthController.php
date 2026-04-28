<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    public function showRegister(){
    return view('register');
    }

   public function save(Request $request)
    {
        
       $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'terms' => 'required'
        ]);

        // Save Data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            ]);

        return redirect()->back()->with('success', 'Registration successful!');
        
    }

    public function showLogin(){
    return view('login');
    }



public function login(Request $request)
{
   
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    
    if (Auth::attempt(['email' => $request->email,'password' => $request->password], $request->remember)) {
       
    if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successful');
        }elseif (Auth::user()->role_id == 2) {

            return redirect()->route('leader.dashboard')->with('success', 'Login successful');
        }
     
    }

    return back()->withErrors([
        'email' => 'Invalid email or password'
    ])->withInput();
}
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}