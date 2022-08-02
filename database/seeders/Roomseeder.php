<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

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
                'capacity' => '5'
            ],
            [
                'name' => 'Ruangan 2',
                'code' => 'A2',
                'capacity' => '6'
            ],
            [
                'name' => 'Ruangan 3',
                'code' => 'A3',
                'capacity' => '7'
            ]
        ];
        Room::insert($data);
    }
}
