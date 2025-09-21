<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Hash;
class LoginController extends Controller
{
    function __construct(
        User $user
    ){
        $this->user = $user;
    }

    public function login(Request $request){
        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);
        $user = $this->user->where('email',$loginUserData['email'])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'status' => true,
            'data' => [
                'generate' => $user->generate,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email
            ],
            'token' => $token,
        ],200);
    }
}
