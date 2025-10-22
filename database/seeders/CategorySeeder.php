<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'CPU'],
            ['name' => 'Mainboard'],
            ['name' => 'RAM'],
            ['name' => 'GPU'],
            ['name' => 'Storage'],
            ['name' => 'Case'],
            ['name' => 'PSU'],
            ['name' => 'Cooling'],
            ['name' => 'Monitor'],
            ['name' => 'Keyboard'],
            ['name' => 'Mouse'],
            ['name' => 'Headset'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
