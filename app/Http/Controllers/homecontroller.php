<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;
use App\Models\Feature;

class homecontroller extends Controller
{
    public function index()
    {
        $tes = Benefit::all();
        $features = Feature::all();
      
        $data = [
            'bene' => $tes,// Tambahkan ulasan ke dalam array data
            'features' => $features,
        ];

        return view("welcome", $data);
    }
}
