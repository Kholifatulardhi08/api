<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(Roomseeder::class);
        $this->call(Unitseeder::class);
        $this->call(Drinkseeder::class);
        $this->call(Mealseeder::class);
        $this->call(Bookingseeder::class);
        $this->call(Pantryseeder::class);
    }
}
