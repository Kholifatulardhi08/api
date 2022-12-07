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
                'start' => new Carbon('2022-11-23 10:32:00'),
                'end' => new Carbon('2022-11-23 15:00:00'),
                'user_id' => 1,
                'room_id' => 1,
                'unit_id' => 1,
                'invite' => 'ardhi.kholifatul8@gmail.com, briiliandy@gmail.com',
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'agenda' => 'Meeting 2',
                'person' => 10,
                'start' => new Carbon('2022-11-23 11:32:00'),
                'end' => new Carbon('2022-11-23 15:00:00'),
                'user_id' => 2,
                'room_id' => 2,
                'unit_id' => 2,
                'invite' => 'ardhi.kholifatul8@gmail.com, briiliandy@gmail.com',
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'agenda' => 'Meeting 3',
                'person' => 7,
                'start' => new Carbon('2022-11-23 13:32:00'),
                'end' => new Carbon('2022-11-23 16:00:00'),
                'user_id' => 3,
                'room_id' => 3,
                'unit_id' => 3,
                'invite' => 'ardhi.kholifatul8@gmail.com, briiliandy@gmail.com',
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'agenda' => 'Meeting 4',
                'person' => 4,
                'start' => new Carbon('2022-11-24 09:00:00'),
                'end' => new Carbon('2022-11-24 12:00:00'),
                'user_id' => 4,
                'room_id' => 3,
                'unit_id' => 3,
                'invite' => 'ardhi.kholifatul8@gmail.com, briiliandy@gmail.com',
                'status_active' => true,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ],
            [
                'agenda' => 'Meeting 5',
                'person' => 5,
                'start' => new Carbon('2022-11-24 13:00:00'),
                'end' => new Carbon('2022-11-24 15:00:00'),
                'user_id' => 2,
                'room_id' => 3,
                'unit_id' => 3,
                'invite' => 'ardhi.kholifatul8@gmail.com, briiliandy@gmail.com',
                'status_active' => True,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s')
            ]
        ];
        Booking::insert($data);
    }
}
