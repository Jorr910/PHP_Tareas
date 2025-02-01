<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['nombre' => 'Juanito', 'email' => 'juanito@gmail.com'],
            ['nombre' => 'Alcachofa', 'email' => 'alcachofa@gmail.com'],
            ['nombre' => 'Jorge', 'email' => 'prueba@gmail.com'],
            ['nombre' => 'Jairo', 'email' => 'coach@gmail.com'],
            ['nombre' => 'Karla', 'email' => 'karla@gmail.com'],
            ['nombre' => 'Rambo', 'email' => 'Soldado@gmail.com'],
        ]);
    }
}