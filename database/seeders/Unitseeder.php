<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class Unitseeder extends Seeder
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
                'name' => 'Digital Bussines Solution',
                'code' => 'DBS',
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Head Reqruitment',
                'code' => 'HR',
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Telco Digital Solution',
                'code' => 'TDS',
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Cloud services',
                'code' => 'CS',
                'status_active' => 1,
                'created_at' => date_create()->format('Y-m-d H:i:s'),
                'updated_at' => date_create()->format('Y-m-d H:i:s'),
            ]
        ];
        Unit::insert($data);
    }
}
