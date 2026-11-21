<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   function register(StoreRegisterRequest $request)
   {
    $validate = $request->validated();

    $user = User::create($validate);

    $token  = $user->createToken('api-token')->plainTextToken;

    return response()->json([

    'user' =>$user,
    'token'=>$token,

    ],201);
   }
}
