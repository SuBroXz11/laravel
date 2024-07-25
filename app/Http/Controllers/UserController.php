<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show registration form 
    public function create(){
        return view('users.register');
    }

    // Show registration form 
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>['required', 'min:3'],
            'email'=>['required', 'email', Rule::unique('users', 'email')],
            'password'=>'required|confirmed|min:6'
        ]);

        // Hash password using bcrypt
        $formFields['password']=bcrypt($formFields['password']);

        // create user
        $user=User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message' ,'User created and logged in');
    }

     // Logout user
     public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

     // Show login form
     public function login(){
        return view('users.login');
    }

     // login User
     public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required', 'email'],
            'password'=>'required'
        ]);
        
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message' ,'You are now logged in'); 
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email'); // we did this for security reasons 
        // that is hacker would not know if email or even password exists for the account
    }
}
