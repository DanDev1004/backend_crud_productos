<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Camiseta Overskull',
                'description' => 'Camiseta negra edición limitada',
                'price' => '89.90',
                'stock' => 50,
                'category' => 'Ropa',
            ],
            [
                'name' => 'Sudadera Overskull',
                'description' => 'Sudadera de algodón',
                'price' => '159.90',
                'stock' => 25,
                'category' => 'Ropa',
            ],
            [
                'name' => 'Zapatillas Urban',
                'description' => 'Zapatillas urbanas negras',
                'price' => '229.00',
                'stock' => 15,
                'category' => 'Calzado',
            ],
            [
                'name' => 'Gorra Overskull',
                'description' => 'Gorra ajustable',
                'price' => '49.90',
                'stock' => 40,
                'category' => 'Accesorios',
            ],
        ];

        foreach ($products as $product) {
            $categoryId = Category::where('name', $product['category'])->firstOrFail()->id;

            Product::firstOrCreate(
                ['name' => $product['name']],
                [
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'stock' => $product['stock'],
                    'category_id' => $categoryId,
                ]
            );
        }
    }
}
