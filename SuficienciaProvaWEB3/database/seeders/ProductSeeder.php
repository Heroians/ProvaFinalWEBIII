<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::where('name', 'Eletrônicos')->first();
        $books = Category::where('name', 'Livros')->first();
        $clothes = Category::where('name', 'Roupas')->first();
        $toys = Category::where('name', 'Brinquedos')->first();

        Product::create([
            'name' => 'Fone de Ouvido Bluetooth',
            'description' => 'Fone sem fio com cancelamento de ruído.',
            'price' => 299.90,
            'category_id' => $electronics->id,
        ]);

        Product::create([
            'name' => 'O Senhor dos Anéis',
            'description' => 'Trilogia completa em um volume.',
            'price' => 149.90,
            'category_id' => $books->id,
        ]);

        Product::create([
            'name' => 'Camiseta Geek',
            'description' => 'Camiseta 100% algodão com estampa temática.',
            'price' => 79.90,
            'category_id' => $clothes->id,
        ]);

        Product::create([
            'name' => 'Blocos de Montar',
            'description' => 'Kit com 500 peças coloridas.',
            'price' => 199.90,
            'category_id' => $toys->id,
        ]);
    }
}
