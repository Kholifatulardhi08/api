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
                'total' => 30,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Lumpia',
                'total' => 15,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Risol',
                'total' => 20,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Combro',
                'total' => 17,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bakpao',
                'total' => 11,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Mendowan',
                'total' => 7,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bakwan',
                'total' => 5,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Putu',
                'total' => 16,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ]
        ];
        Meal::insert($data);
    }
}
