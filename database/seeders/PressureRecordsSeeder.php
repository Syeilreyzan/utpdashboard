<?php

namespace Database\Seeders;

use App\Models\PressureRecord;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PressureRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adjust the loop count as needed to create desired records
        $numberOfRecords = 4; // For example, creating 10 records

        for ($i = 0; $i < $numberOfRecords; $i++) {
            PressureRecord::create([
                'pressure_type' => 'P' . ($i % 4 + 1), // Or any other string value for pressure_type
                'pressure_value' => round(mt_rand(1, 9999) / 100, 2)
                // Adjust the range and logic for pressure_value as needed
            ]);
        }
    }
}
