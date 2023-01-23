<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'u_type' => 'A'
        ]);
        User::factory(1)->create([
            'name' => 'employee',
            'email' => 'employee@gmail.com'
        ]);
        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
