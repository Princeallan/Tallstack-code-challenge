<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PropertyStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\Property::factory(50)->create();
        $this->call([
//            PropertyTypeSeeder::class,
//            PropertyStatusSeeder::class,
//            CategorySeeder::class
//            LocationSeeder::class
        ]);
    }
}
