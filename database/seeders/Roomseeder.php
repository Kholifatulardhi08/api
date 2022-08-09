<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class Roomseeder extends Seeder
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
                'name' => 'Ruangan 1',
                'code' => 'A1',
                'capacity' => 5,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ruangan 2',
                'code' => 'A2',
                'capacity' => 6,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ruangan 3',
                'code' => 'A3',
                'capacity' => '7',
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ruangan 4',
                'code' => 'B11',
                'capacity' => 5,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ruangan 5',
                'code' => 'A9',
                'capacity' => 10,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Ruangan 6',
                'code' => 'C1',
                'capacity' => 15,
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ]
        ];
        Room::insert($data);
    }
}
