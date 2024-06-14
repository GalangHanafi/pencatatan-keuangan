<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $faqs = Faq::all();

        return view('welcome', compact('faqs'));
    }
}
