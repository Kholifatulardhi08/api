<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pantry;

class Pantryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'booking_id' => 1,
                'meal_id' => 5,
                'drink_id' => 5,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'booking_id' => 2,
                'meal_id' => 4,
                'drink_id' => 4,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'booking_id' => 3,
                'meal_id' => 3,
                'drink_id' => 3,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'booking_id' => 4,
                'meal_id' => 2,
                'drink_id' => 2,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'booking_id' => 5,
                'meal_id' => 1,
                'drink_id' => 1,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ]
        ];
        Pantry::insert($data);
    }
}
