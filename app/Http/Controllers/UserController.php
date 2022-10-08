<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    { 
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users', // не выдает 401 если email не уникальный
            'password' => 'required|min:8'
        ]);
        
        if ($validate == false) {
            return response()->json(['error' => $validate->errors()], 401);
        } else {
            $input = $request->all();
            $user = User::create($input); // можно объединить token и token_2 и вынести наверх 
            if ($request->input('is_admin') == 1) 
            {
                $user->is_admin = true;
                $token = $user->createToken('token-name', ['admin'])->plainTextToken;
                $user->remember_token = $token;
                $user->save();
                return response()->json(['You are administrator' => $token], 200);
            } else {
                $token_2 = $user->createToken('token-name', ['server:update'])->plainTextToken;
                $user->remember_token = $token_2;
                return response()->json(['Your token ' => $token_2], 200);
            }
        }
    } 
}
