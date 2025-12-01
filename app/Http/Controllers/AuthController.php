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
        /*$email = $request->input('email');
        $password = $request->input('password');*/

        $credentials= $request-> only('email', 'password');

        if(auth()->attempt($credentials)){
            return response() -> json(['messaje' => 'login superfull',
            'user' => auth()-> user(),],
            200);
        }
        
        else{
            return response() -> json(['messaje' => 'invalido credencials'], 401);
        }
    }
}

        /*
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
             //file:///C:/Users/yurid/Downloads/Proyecto_final/Proyecto_final/Login_vista/index.html                                                  
            $ruta_base = 'file:///C:/Users/yurid/Downloads/Proyecto_final/Proyecto_final/Login_vista/index.html';
            if ($user->email === 'admin@gmail.com') {
                $redirectTo = 'file:///C:/Users/yurid/Downloads/Proyecto_final/Proyecto_final/vista/index.html';
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
        ], 500);*/
        
    



       