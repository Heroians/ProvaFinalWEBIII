<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Eletrônicos', 'description' => 'Aparelhos e gadgets modernos.'],
            ['name' => 'Livros', 'description' => 'Obras de ficção, estudo e lazer.'],
            ['name' => 'Roupas', 'description' => 'Moda masculina e feminina.'],
            ['name' => 'Brinquedos', 'description' => 'Diversão para todas as idades.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
