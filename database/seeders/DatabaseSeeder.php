<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            HomeSeeder::class
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
        // verify superadmin
        DB::table('users')->where('email', 'superadmin@example.com')->update(['email_verified_at' => now()]);
    }
}
