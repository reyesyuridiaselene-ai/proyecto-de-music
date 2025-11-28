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
        // 1. Buscar al usuario
        $user = DB::table('users')->where('email', $email)->first(); 

        // 2. Manejar el caso de que el usuario NO exista
        if (!$user) { 
            return response()->json([ //  Este return es necesario aquí
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

        // 3. Verificar la contraseña
        if (Hash::check($password, $user->password)) { //  Lógica de éxito
            
            // --- CÓDIGO DE REDIRECCIÓN Y SESIÓN CORRECTO ---
                                                               
            $ruta_base = 'file:///C:/Users/yurid/OneDrive/Desktop/Proyecto-de-web-final/index-home.html';
            if ($user->email === 'admin@gmail.com') {
                $redirectTo = 'file:///C:/Users/yurid/OneDrive/Desktop/Proyecto-de-web-final/index-home.html';
            }

            // Autenticar la sesión de Laravel
            $eloquentUser = \App\Models\User::find($user->id);
            Auth::login($eloquentUser);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => $user,
                'redirect_to' => $redirectTo,
            ]);
            // -----------------------------------------------
            
        } else {
            // 4. Manejar el caso de contraseña incorrecta
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }

    } catch (\Exception $e) {
        // 5. Manejar errores del servidor
        return response()->json([
            'status' => 'error',
            'message' => 'Server error: ' . $e->getMessage(),
        ], 500);
        /*$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user(); 
            
            if ($user->email === 'admin@ejemplo.com') {
                
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
                
            }

            $request->session()->regenerate();
            return redirect()->intended('/dashboard');

        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }*/
         //funcion que usamos para verificar el usuario admin y que funcione con la base de datos
       
       /* $email = $request->input('email');
        $password = $request->input('password');

        try {
            $user = DB::table('users')->where('email', $email)->first(); 

            if (!$user) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid credentials',
                ], 401);
            }

            // Verificar la contraseña primero
            if (Hash::check($password, $user->password)) {
                // Determinar la URL de redirección según el tipo de usuario
                $redirectTo = 'http://127.0.0.1:8000/index-home'; 
                if ($user->email === 'admin@ejemplo.com') {
                    $redirectTo = 'http://127.0.0.1:8000/admin/dashboard';
                }

                // Autenticar al usuario en la sesión
                $eloquentUser = \App\Models\User::find($user->id);
                Auth::login($eloquentUser);
                
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'user' => $user,
                    'redirect_to' => $redirectTo,
                    'token_type' => 'Bearer',
                ]);
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
        }*/
    }
}
}

       