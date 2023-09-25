<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // BECAUSE WE HAVE A USER FACTORY, WE CAN USE THIS FACTORY METHOD
        // WE PASS IN HOW MANY USERS WE WANT TO CREATE
        // THIS CREATES 1 USER FOR ME
        // THE EMAIL AND PASSWORD ARE SET IN THE USER FACTORY.PHP
        // MAKE SURE THE CONNECTION TO THE DB IS WORKING BY TURNING ON XAMPP THEN SEEDING THE DB
        // PHP ARTISAN DB:SEED
        // IF CORRECT, YOU WILL HAVE WHATEVER USER IS IN THE USERFACTORY IN YOUR DB NOW
        User::factory(1)->create();
    }
}
