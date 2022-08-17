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
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lumpia',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Risol',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Combro',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bakpao',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mendowan',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bakwan',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Cetot',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],

            [
                'name' => 'Putu',
                'total' => 1,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
        ];
        Meal::insert($data);
    }
}
