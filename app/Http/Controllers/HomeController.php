<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Faq;
use App\Models\Feature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'benefits' => Benefit::all(),
            'features' => Feature::all(),
            'faqs' => Faq::all(),
        ];

        return view('welcome', $data);
    }
}
