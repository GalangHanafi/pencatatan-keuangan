<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Benefit;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Why;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'benefits' => Benefit::all(),
            'features' => Feature::all(),
            'faqs' => Faq::all(),
            'user' => Account::all(),
            'ulasan' => Why::all(),
        ];

        return view('welcome', $data);
    }
}
