<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now(); // Obtener la fecha y hora actuales

        $categorias = [
            [
                'icono' => 'cafe',
                'nombre' => 'Café',
                'uri' => 'cafe',
                'id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icono' => 'hamburguesa',
                'nombre' => 'Hamburguesas',
                'uri' => 'hamburguesas',
                'id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icono' => 'pizza',
                'nombre' => 'Pizzas',
                'uri' => 'pizzas',
                'id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icono' => 'dona',
                'nombre' => 'Donas',
                'uri' => 'donas',
                'id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icono' => 'pastel',
                'nombre' => 'Pasteles',
                'uri' => 'pasteles',
                'id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'icono' => 'galletas',
                'nombre' => 'Galletas',
                'uri' => 'galletas',
                'id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
         // Inserta todas las categorías en una sola consulta
         Categoria::insert($categorias);
    }
}
