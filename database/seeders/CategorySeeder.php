<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Ropa', 'description' => 'Prendas de vestir'],
            ['name' => 'Calzado', 'description' => 'Zapatos y zapatillas'],
            ['name' => 'Accesorios', 'description' => 'Complementos y accesorios'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
