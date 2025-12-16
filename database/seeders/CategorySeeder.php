<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Smartphone & Tablet'],
            ['name' => 'Laptop & Komputer'],
            ['name' => 'TV & Audio'],
            ['name' => 'Peralatan Rumah Tangga'],
            ['name' => 'Aksesoris Elektronik'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
