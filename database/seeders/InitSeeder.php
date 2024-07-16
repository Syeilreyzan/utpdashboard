<?php

namespace Database\Seeders;

use App\Models\Node;
use App\Models\NodeParameter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake('ms_MY');

        $equipment = [
            [
                'equipment_label' => 'Node 1',
                'equipment_type' => 'equipment_1',
                'max_value' => $faker->numberBetween(1, 100),
                'min_value' => $faker->numberBetween(1, 100),
                'unit_of_measurement' => 'CO2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'equipment_label' => 'Node 2',
                'equipment_type' => 'equipment_1',
                'max_value' => $faker->numberBetween(1, 100),
                'min_value' => $faker->numberBetween(1, 100),
                'unit_of_measurement' => 'celcius',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'equipment_label' => 'Node 3',
                'equipment_type' => 'equipment_1',
                'max_value' => $faker->numberBetween(1, 50),
                'min_value' => $faker->numberBetween(1, 50),
                'unit_of_measurement' => 'psi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'equipment_label' => 'Node 3',
                'equipment_type' => 'equipment_2',
                'max_value' => $faker->numberBetween(1, 50),
                'min_value' => $faker->numberBetween(1, 50),
                'unit_of_measurement' => 'psi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'equipment_label' => 'Node 4',
                'equipment_type' => 'equipment_1',
                'max_value' => $faker->numberBetween(1, 14),
                'min_value' => $faker->numberBetween(1, 14),
                'unit_of_measurement' => 'pH',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        $this->command->getOutput()->block('Start Seeding...');
        $this->command->getOutput()->block('Starting Seeding Node');
        Node::insert($equipment);
        $this->command->getOutput()->block('End Seeding Node');

        $nodes = Node::all();

        foreach($nodes as $node) {
            $node_id = $node->id;

            $now = now();
            $randNum = random_int(5, 20);

            $this->command->getOutput()->block('Starting Seeding Node Parameter for ' . $node->equipment_label);
            $this->command->getOutput()->progressStart($randNum);
            if ($node_id == 1 || $node_id == 2) {
                for ($i = 0; $i < $randNum; $i++) {
                    NodeParameter::create([
                        'node_id' => $node_id,
                        'date_time' => $now->addSeconds(random_int(5, 60)),
                        'current_value' => random_int(0, 100),
                    ]);
                    $this->command->getOutput()->progressAdvance();
                }
            }elseif ($node_id == 3) {
                for ($i = 0; $i < $randNum; $i++) {
                    NodeParameter::create([
                        'node_id' => $node_id,
                        'date_time' => $now->addSeconds(random_int(5, 60)),
                        'current_value' => random_int(0, 50),
                    ]);
                    $this->command->getOutput()->progressAdvance();
                }
            }elseif ($node_id == 4) {
                for ($i = 0; $i < $randNum; $i++) {
                    NodeParameter::create([
                        'node_id' => $node_id,
                        'date_time' => $now->addSeconds(random_int(5, 60)),
                        'current_value' => random_int(0, 50),
                    ]);
                    $this->command->getOutput()->progressAdvance();
                }
            }elseif ($node_id == 5) {
                for ($i = 0; $i < $randNum; $i++) {
                    NodeParameter::create([
                        'node_id' => $node_id,
                        'date_time' => $now->addSeconds(random_int(5, 60)),
                        'current_value' => random_int(0, 14),
                    ]);
                    $this->command->getOutput()->progressAdvance();
                }
            }
            $this->command->getOutput()->progressFinish();
            $this->command->getOutput()->block('End Seeding Node Parameter for ' . $node->equipment_label);
        }

        $this->command->getOutput()->block('Finished...');
    }
}
