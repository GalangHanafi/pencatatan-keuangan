<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user1@example.com
        $user = User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // make account for this user named cash
        $user->accounts()->create([
            'name' => 'user1 Cash',
            'balance' => 1000,
            'icon' => 'ti ti-cash',
        ]);
    }
}
