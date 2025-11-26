<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//importaciones de la base de datos//
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
// se usa para que podamos interactuar con la base de datos y la contraseña
//para poder cifrarla

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com', 
            'password' => Hash::make('1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
