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
            'password'=>'required|confirmed',
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
}
