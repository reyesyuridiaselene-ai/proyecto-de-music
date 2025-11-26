<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;//importacion para el login de el usuario
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $user = DB::table('users')->where('email', $email)->first(); 

            if (!$user) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid credentials',
                ], 401);
            }

            if (Hash::check($password, $user->password)) {
                
                $eloquentUser = \App\Models\User::find($user->id); 
                
                // 3. Crear el Token para mas seguridad :3
                $token = $eloquentUser->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'user' => $user,
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);
                        
                //return response()->json([
                    //'status' => 'success',
                    //'message' => 'Login successful',
                   // 'user' => $user 
               // ]);
            } else {
               
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid credentials',
                ], 401);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
