<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use Carbon\Carbon;

class Bookingseeder extends Seeder
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
                'agenda' => 'Meeting 1',
                'snack' => '10',
                'date' => Carbon::create('2022', '08', '14'),
                'person' => 10,
                'start_time' => date_create()->format('Y-m-d H:i:s'),
                'end_time' => date_create()->format('Y-m-d H:i:s'),
                'user_id' => 1,
                'room_id' => 1,
                'unit_id' => 1,
            ],
            [
                'agenda' => 'Meeting 2',
                'snack' => '5',
                'date' => Carbon::create('2022', '08', '14'),
                'person' => 5,
                'start_time' => date_create()->format('Y-m-d H:i:s'),
                'end_time' => date_create()->format('Y-m-d H:i:s'),
                'user_id' => 2,
                'room_id' => 2,
                'unit_id' => 2,
            ],
            [
                'agenda' => 'Meeting 3',
                'snack' => '10',
                'date' => Carbon::create('2022', '08', '17'),
                'person' => 10,
                'start_time' => date_create()->format('Y-m-d H:i:s'),
                'end_time' => date_create()->format('Y-m-d H:i:s'),
                'user_id' => 4,
                'room_id' => 3,
                'unit_id' => 3,
            ],
            [
                'agenda' => 'Meeting 4',
                'snack' => '10',
                'date' => Carbon::create('2022', '08', '18'),
                'person' => 10,
                'start_time' => date_create()->format('Y-m-d H:i:s'),
                'end_time' => date_create()->format('Y-m-d H:i:s'),
                'user_id' => 4,
                'room_id' => 3,
                'unit_id' => 3,
            ],
            [
                'agenda' => 'Meeting 5',
                'snack' => '10',
                'date' => Carbon::create('2022', '08', '19'),
                'person' => 10,
                'start_time' => date_create()->format('Y-m-d H:i:s'),
                'end_time' => date_create()->format('Y-m-d H:i:s'),
                'user_id' => 2,
                'room_id' => 3,
                'unit_id' => 3,
            ]
        ];
        Booking::insert($data);
    }
}
