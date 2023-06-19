<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    // /**
    //  * Register a new user.
    //  *
    //  * @param  Request  $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'password' => 'required|string',
            'c_password' => 'same:password', 
            'email' => 'required|string|email|unique:users',
            'phone' => 'string',
            'gender' => 'string',
            'role' => 'string'
        ]);

        $user = User::create([
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'password' => bcrypt($request->password),
            'c_password' => bcrypt($request->c_password),
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role' => $request->role,
        ]);

        $token = $user->createToken('authToken')->plainTextToken;


        // Log in the user after registration
        auth()->login($user);

        return response()->json(['message' => 'Registration successful', 'user' => $user , 'userRole' => $user->role],201);

    }

    // /**
    //  * Log in the user and generate a token.
    //  *
    //  * @param  Request  $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($credentials)) {
            $user = Auth::user();
            $user->save();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'user' => auth()->user(),'token' => $token , 'userRole' => $user->role]);
        }

    return response()->json(['message' => 'Invalid credentials' ], 401);
    }




    


    //logout
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }

}



    

