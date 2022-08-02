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
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("password"),
            "phone_number" => "08123456789",
            "status_verified" => true,
            "role" => "Admin",
            "created_at" => date_create()->format('Y-m-d H:i:s'),
            "updated_at" => date_create()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            "name" => "Ardi",
            "email" => "ardi@gmail.com",
            "password" => Hash::make("password"),
            "phone_number" => "081243667891",
            "status_verified" => false,
            "role" => "Guest",
            "created_at" => date_create()->format('Y-m-d H:i:s'),
            "updated_at" => date_create()->format('Y-m-d H:i:s'),
        ]);
            DB::table('users')->insert([
            "name" => "Fadli",
            "email" => "fadli@gmail.com",
            "password" => Hash::make("password"),
            "phone_number" => "081214837896",
            "status_verified" => false,
            "role" => "Pantry",
            "created_at" => date_create()->format('Y-m-d H:i:s'),
            "updated_at" => date_create()->format('Y-m-d H:i:s'),
        ]);
    }
}
