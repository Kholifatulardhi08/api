<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class Mealseeder extends Seeder
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
                'name' => 'Fitbar',
                'total' => 13,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lumpia',
                'total' => 30,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Risol',
                'total' => 20,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Combro',
                'total' => 7,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bakpao',
                'total' => 23,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Pastel',
                'total' => 36,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ]
        ];
        Meal::insert($data);
    }
}
