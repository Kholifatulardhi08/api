<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

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
            ],
            [
                'name' => 'Head Reqruitment',
                'code' => 'HC',
            ],
            [
                'name' => 'Cloud services',
                'code' => 'CS'
            ]
        ];
        Unit::insert($data);
    }
}
