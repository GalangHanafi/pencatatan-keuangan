<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultCategories = [
            [
                'name' => 'Food',
                'icon' => 'ti ti-food',
            ],
            [
                'name' => 'Transportation',
                'icon' => 'ti ti-bus',
            ],
            [
                'name' => 'Entertainment',
                'icon' => 'ti ti-movie',
            ],
            [
                'name' => 'Shopping',
                'icon' => 'ti ti-shopping-cart',
            ],
            [
                'name' => 'Health',
                'icon' => 'ti ti-heartbeat',
            ],
            [
                'name' => 'Bills',
                'icon' => 'ti ti-receipt',
            ],
            [
                'name' => 'Education',
                'icon' => 'ti ti-book',
            ],
            [
                'name' => 'Travel',
                'icon' => 'ti ti-plane',
            ],
            [
                'name' => 'Groceries',
                'icon' => 'ti ti-basket',
            ],
            [
                'name' => 'Utilities',
                'icon' => 'ti ti-flash',
            ],
            [
                'name' => 'Savings',
                'icon' => 'ti ti-piggy-bank',
            ],
            [
                'name' => 'Gifts',
                'icon' => 'ti ti-gift',
            ],
            [
                'name' => 'Investments',
                'icon' => 'ti ti-chart-line',
            ],
            [
                'name' => 'Insurance',
                'icon' => 'ti ti-shield',
            ],
            [
                'name' => 'Pets',
                'icon' => 'ti ti-paw',
            ],
            [
                'name' => 'Personal Care',
                'icon' => 'ti ti-scissors',
            ],
            [
                'name' => 'Rent',
                'icon' => 'ti ti-home',
            ],
            [
                'name' => 'Miscellaneous',
                'icon' => 'ti ti-box',
            ],
            [
                'name' => 'Other',
                'icon' => 'ti ti-dots',
            ]
        ];

        foreach ($defaultCategories as $category) {
            // add [user_id => null] to avoid foreign key error
            $category['user_id'] = NULL;

            Category::create($category);
        }
    }
}
