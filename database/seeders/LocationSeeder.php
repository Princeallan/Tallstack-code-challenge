<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::truncate();

        $data = [[
            'name' => 'Nairobi',
            'user_id' => 1,
        ],[
            'name' => 'Capetown',
            'user_id' => 1,
        ],[
            'name' => 'Kigali',
            'user_id' => 1,
        ],[
            'name' => 'Johannesburg',
            'user_id' => 1,
        ],[
            'name' => 'Mombasa',
            'user_id' => 1,
        ]];

        Location::insert($data);
    }
}
