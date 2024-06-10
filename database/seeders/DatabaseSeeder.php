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
        $this->call([
            IconSeeder::class,
            User1Seeder::class,
            User2Seeder::class,
        ]);

        // make superadmin
        User::create([
            'name' => 'superadmin',
            'phone'=> '',
            'address' => '',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('superadmin'),
            'is_superadmin' => true
        ]);
    }
}
