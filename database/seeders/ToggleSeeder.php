<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToggleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake('ms_MY');

        $toggles = [
            [
                'sensor_name' => 'Node 1',
                'status' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sensor_name' => 'Node 2',
                'status' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sensor_name' => 'Node 3',
                'status' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sensor_name' => 'Node 4',
                'status' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sensor_name' => 'Node 5',
                'status' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sensor_name' => 'Node 6',
                'status' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('toggles')->insert($toggles);
    }
}
