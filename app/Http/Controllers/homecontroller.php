<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;
use App\Models\Feature;

class homecontroller extends Controller
{
    public function index()
    {
        $data = [
            'benefits' => Benefit::all(),
            'features' => Feature::all(),
        ];

        return view("welcome", $data);
    }
}
