<?php

use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maintenance1 = Maintenance::create([
            'oil_changes' => 0,
            'tire_rotations' => 1,
            'tune_ups' => 0,
            'repairs' => 0,
            'car_id' => $car1->id
        ]);

        $maintenance2 = Maintenance::create([
            'oil_changes' => 1,
            'tire_rotations' => 1,
            'tune_ups' => 1,
            'repairs' => 0,
            'car_id' => $car2->id
        ]);

        $maintenance3 = Maintenance::create([
            'oil_changes' => 0,
            'tire_rotations' => 0,
            'tune_ups' => 0,
            'repairs' => 1,
            'car_id' => $car3->id
        ]);
    }
}