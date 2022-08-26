<?php

namespace Database\Seeders;

use App\Models\Drink;
use Illuminate\Database\Seeder;

class Drinkseeder extends Seeder
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
                'name' => 'Aqua Botol',
                'total' => 50,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Aqua Gelas',
                'total' => 39,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Teh Botol',
                'total' => 17,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Le Minerale',
                'total' => 10,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Vit',
                'total' => 26,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Ades',
                'total' => 22,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'crystaline',
                'total' => 1,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Coca-cola',
                'total' => 8,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Fanta',
                'total' => 10,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sprite',
                'total' => 12,
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ]
        ];
        Drink::insert($data);
    }
}
