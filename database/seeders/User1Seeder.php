<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // verify email
        DB::table('users')->where('email', 'user1@example.com')->update(['email_verified_at' => now()]);

        // make reminder
        $user->reminders()->create([
            'name' => 'test',
            'frequency' => 'none',
            'date' => Carbon::now()->toDateString(),
        ]);

        // make default account and default categories for this user
        $user->createDefaultAccount();
        $user->createDefaultCategories();

        // make custom category for this user
        foreach (range(1, 5) as $i) {
            $user->categories()->create([
                'name' => 'user1 Custom Category ' . $i,
                'icon' => 'ti ti-tag',
                'type' => 'expense',
            ]);
        }
    }
}
