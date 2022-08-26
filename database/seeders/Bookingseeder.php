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
                'person' => 10,
                'start' => new Carbon('2022-08-23 11:00:00'),
                'end' => new Carbon('2022-08-23 12:00:00'),
                'user_id' => 1,
                'room_id' => 1,
                'unit_id' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'agenda' => 'Meeting 2',
                'person' => 5,
                'start' => new Carbon('2022-08-10 13:00:00'),
                'end' => new Carbon('2022-08-10 15:00:00'),
                'user_id' => 2,
                'room_id' => 2,
                'unit_id' => 2,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'agenda' => 'Meeting 3',
                'person' => 7,
                'start' => new Carbon('2022-08-05 09:00:00'),
                'end' => new Carbon('2022-08-05 09:30:00'),
                'user_id' => 4,
                'room_id' => 3,
                'unit_id' => 3,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'agenda' => 'Meeting 4',
                'person' => 4,
                'start' => new Carbon('2022-08-11 10:00:00'),
                'end' => new Carbon('2022-08-11 11:00:00'),
                'user_id' => 4,
                'room_id' => 3,
                'unit_id' => 3,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'agenda' => 'Meeting 5',
                'person' => 5,
                'start' => new Carbon('2022-08-17 13:00:00'),
                'end' => new Carbon('2022-08-17 14:00:00'),
                'user_id' => 2,
                'room_id' => 3,
                'unit_id' => 3,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ]
        ];
        Booking::insert($data);
    }
}
