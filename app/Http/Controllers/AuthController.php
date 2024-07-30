<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash; // bcrypt

class AuthController extends Controller
{
    public function register(Request $request){
        // validation
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',
        ]);

        // user creation
        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=> bcrypt($fields['password'])
        ]);

        // token creation
        $token = $user->createToken('myapptoken')->plainTextToken;

        // creating and sending the response
        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response, 201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return [
            'message'=>'Logged out successfully'
        ];
    }

    public function login(Request $request){
        // validation
        $fields=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        // Check email
        $user= User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message'=>'Bad credentials'
            ], 401);
        }

        // token creation
        $token = $user->createToken('myapptoken')->plainTextToken;

        // creating and sending the response
        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response, 201);
    }
}
