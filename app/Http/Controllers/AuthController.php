<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function index()
    {
        
        $user =User::paginate(25);
        return response()->json($user);
    }
    public function show($id)
    {
        return User::find($id);
    }

    // Register
    public function register (Request $request) {
        // Validate fields
        $fields = $request->validate([
            'fullname' => 'required|string|max:255',
            'lastname' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|confirmed',
            'tel' => 'required',
            'role' => 'required|integer',
        ]);
        // Create user
        $user = User::create([
            'fullname' => $fields['fullname'],
            'lastname' => $fields['lastname'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'tel' => $fields['tel'],
            'role' => $fields['role'],
        ]);
        // Create token
        $token = $user->createToken($request->userAgent(), ["$user->role"])->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    
}

    // Login
    public function login (Request $request) {
        // Validate fields
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        // check email
        $user = User::where('email', $fields['email'])->first();
        // check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid login!'
            ], 401);
        }else{
            $user->tokens()->delete();
            // Create token
            $token = $user->createToken($request->userAgent(), ["$user->role"])->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token,
            ];
            return response($response, 201);
        }


    }
    // Logout
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }

}