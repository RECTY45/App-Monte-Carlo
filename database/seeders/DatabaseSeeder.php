<?php

namespace Database\Seeders;

use App\Models\CarloD;
use App\Models\CarloPD;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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


            $petugass = [
                [
                    "username" => "user",
                    "password" => 'user',
                    "name" => 'User Carlo',
                ]
                ];
   
              
        foreach($petugass as $petugas){
            User::create($petugas);
        }

    }
}
