<?php

namespace Database\Seeders;

use App\Models\FlowControllerRecords;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlowControllerRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adjust the loop count as needed to create desired records
        $numberOfRecords = 8; // For example, creating 10 records

        for ($i = 0; $i < $numberOfRecords; $i++) {
            FlowControllerRecords::create([
                'flow_controller_type' => 'FC ' . ($i % 2 + 1), // Or any other string value for pressure_type
                'flow_controller_value' => round(mt_rand(1, 9999) / 100, 2)
                // Adjust the range and logic for pressure_value as needed
            ]);
        }
    }
}
