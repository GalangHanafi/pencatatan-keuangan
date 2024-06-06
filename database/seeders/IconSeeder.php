<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $icons = [
            'ti ti-activity',
            'ti ti-alarm',
            'ti ti-alert-circle',
            'ti ti-archive',
            'ti ti-arrow-back-up',
            'ti ti-at',
            'ti ti-award',
            'ti ti-bell',
            'ti ti-cash',
            'ti ti-briefcase',
            'ti ti-calendar',
            'ti ti-camera',
            'ti ti-check',
            'ti ti-clock',
            'ti ti-compass',
            'ti ti-credit-card',
            'ti ti-currency-dollar',
            'ti ti-database',
            'ti ti-eye',
            'ti ti-file-text',
            'ti ti-folder',
            'ti ti-gift',
            'ti ti-globe',
            'ti ti-heart',
            'ti ti-home',
            'ti ti-inbox',
            'ti ti-lock',
            'ti ti-mail',
            'ti ti-map',
            'ti ti-message-circle',
            'ti ti-music',
            'ti ti-navigation',
            'ti ti-package',
            'ti ti-paperclip',
            'ti ti-phone',
            'ti ti-printer',
            'ti ti-settings',
            'ti ti-share',
            'ti ti-shopping-cart',
            'ti ti-star',
            'ti ti-sun',
            'ti ti-tag',
            'ti ti-target',
            'ti ti-thermometer',
            'ti ti-trending-up',
            'ti ti-truck',
            'ti ti-umbrella',
            'ti ti-user',
            'ti ti-wifi',
            'ti ti-wind',
            'ti ti-x',
        ];

        foreach ($icons as $icon) {
            Icon::create([
                'name' => $icon
            ]);
        }
    }
}
