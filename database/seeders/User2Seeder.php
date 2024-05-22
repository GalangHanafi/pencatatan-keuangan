<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class User2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user2@example.com
        $user = User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => '12345678',
            'photo' => 'storage/photos/default.jpg',
        ]);

        // make account for this user named cash
        $user->accounts()->create([
            'name' => 'user2 Cash',
            'amount' => 2000,
            'icon' => 'ti ti-cash',
        ]);
    }
}
