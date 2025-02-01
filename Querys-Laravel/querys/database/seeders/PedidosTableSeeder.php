<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // PEDIDOS EN BASE A MIGRATIONS: 
        DB::table('pedidos')->insert([

            ['usuario_id' => 1, 'producto' => 'manzanas - $2', 'cantidad' => 5, 'total' => 10.00],
            ['usuario_id' => 2, 'producto' => 'uvas gajo - $4', 'cantidad' => 2, 'total' => 8.00],
            ['usuario_id' => 3, 'producto' => 'Ejotes - $1', 'cantidad' => 4, 'total' => 4.00],
            ['usuario_id' => 4, 'producto' => 'Ajos - $0.75', 'cantidad' => 7, 'total' => 5.25],
            ['usuario_id' => 5, 'producto' => 'Aceite - $5.75', 'cantidad' => 2, 'total' => 11.50],
            ['usuario_id' => 2, 'producto' => 'Nintendo Switch - $250', 'cantidad' => 1, 'total' => 250.00],
            ['usuario_id' => 5, 'producto' => 'Lichas - $1', 'cantidad' => 1, 'total' => 1.00],
        ]);
    }
}