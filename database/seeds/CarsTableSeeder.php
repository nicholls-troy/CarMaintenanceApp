<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'make' => 'Tesla',
            'model' => '3',
            'year' => '2021',
            'colour' => 'Black',
            'maintenance_id' => $maintenance1->id
        ]);

        Car::create([
            'make' => 'BMW',
            'model' => 'X1',
            'year' => '2019',
            'colour' => 'Yellow',
            'maintenance_id' => $maintenance2->id
        ]);

        Car::create([
            'make' => 'Ferrari',
            'model' => 'Roma',
            'year' => '2020',
            'colour' => 'Blue',
            'maintenance_id' => $maintenance3->id
        ]);
    }
}