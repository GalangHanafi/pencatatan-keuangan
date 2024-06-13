<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Icon;

class homecontroller extends Controller
{
    public function index()
    {
        $features = Feature::all();
        $icons = Icon::all();
        $data = [
            'title' => 'feature',
            'breadcrumbs' => [
                'features' => '#',
            ],
            'features' => $features,
            'icon' => $icons,
            'content' => 'features.index',
        ];

        return view("welcome", $data);
    }
}
