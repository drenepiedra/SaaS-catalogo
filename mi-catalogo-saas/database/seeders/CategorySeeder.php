<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin Demo',
            'business_name' => 'Tienda Demo',
            'email' => 'demo@ejemplo.com',
            'password' => bcrypt('password'),
        ]);

        $categories = [
            ['name' => 'Electrónicos', 'description' => 'Celulares, laptops, tablets y accesorios tecnológicos'],
            ['name' => 'Ropa y Moda', 'description' => 'Prendas de vestir, calzado y accesorios de moda'],
            ['name' => 'Hogar', 'description' => 'Muebles, decoración y artículos para el hogar'],
            ['name' => 'Alimentos y Bebidas', 'description' => 'Productos alimenticios, bebidas y snacks'],
            ['name' => 'Salud y Belleza', 'description' => 'Cosméticos, cuidado personal y suplementos'],
            ['name' => 'Deportes', 'description' => 'Equipamiento deportivo, ropa y accesorios'],
            ['name' => 'Juguetes', 'description' => 'Juguetes, juegos y entretenimiento infantil'],
            ['name' => 'Automotriz', 'description' => 'Accesorios y piezas para vehículos'],
            ['name' => 'Libros', 'description' => 'Libros, revistas y material educativo'],
            ['name' => 'Servicios', 'description' => 'Servicios profesionales y consultorías'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'user_id' => $user->id,
            ]);
        }

        $this->command->info("Usuario demo creado: demo@ejemplo.com / password");
        $this->command->info("Se crearon " . count($categories) . " categorías de ejemplo.");
    }
}
