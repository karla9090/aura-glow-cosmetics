<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nombre' => 'Cuidado Facial', 'slug' => 'cuidado-facial', 'descripcion' => 'Sérums, cremas hidratantes y limpiadores.'],
            ['nombre' => 'Maquillaje', 'slug' => 'maquillaje', 'descripcion' => 'Bases, labiales, rímel y paletas de sombras.'],
            ['nombre' => 'Cuidado Corporal', 'slug' => 'cuidado-corporal', 'descripcion' => 'Exfoliantes, lociones y aceites corporales.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
