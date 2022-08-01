<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "id" => 1,
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("password"),
            "phone_number" => "08123456789",
            "status_verified" => true,
            "role" => "admin",
            "created_at" => date_create()->format('Y-m-d H:i:s'),
            "updated_at" => date_create()->format('Y-m-d H:i:s'),
        ]);
    }
}
