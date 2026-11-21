<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public  function register(StoreRegisterRequest $request)
   {
    $validate = $request->validated();

    $user = User::create($validate);

    $token  = $user->createToken('api-token')->plainTextToken;

    return response()->json([

    'user' =>$user,
    'token'=>$token,

    ],201);
   }

   public function login (StoreLoginRequest $request)
   {
    $user = User::where('email', $request->email)->first();
    if(!$user || !Hash::check($request->password,$user->password) )
        {
            return response()->json(['message' => 'Invalid credentials'],401);
        }
        $token = $user->createToken('api-token')->plainTextToken;

         return response()->json(['user' => $user,
         'token'=>$token],200);

   }

     public function Logout (StoreLoginRequest $request)
   {
    
    $request->user()->currentAccessToken()->delete();
    
            return response()->json(['message' => 'Loged out']);
       

   }
}
