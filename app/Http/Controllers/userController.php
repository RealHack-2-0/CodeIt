<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class userController extends Controller
{
    //


    public function getAll(){

        $user=User::all();
        return response()->json(['users'=>$user],200);

     }


     public function register(Request $request)
    {
        $user = User::create([
             'email'    => $request->email,
             'password' => $request->password,
         ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
        
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user =auth()->user();

        //return $this->respondWithToken($token);
        return response()->json(['token' => $token,'user'=>$user]);

    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
