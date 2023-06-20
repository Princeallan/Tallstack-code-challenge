<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        $data = [[
            'name' => 'Property',
            'user_id' => 1,
        ],[
            'name' => 'Cars',
            'user_id' => 1,
        ],[
            'name' => 'Furniture',
            'user_id' => 1,
        ]];

        Category::insert($data);
    }
}
