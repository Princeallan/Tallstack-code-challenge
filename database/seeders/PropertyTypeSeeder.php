<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyType::truncate();

        $data = [[
            'name' => 'Rent',
            'user_id' => 1,
        ],[
            'name' => 'Buy',
            'user_id' => 1,
        ]];

        PropertyType::insert($data);
    }
}
