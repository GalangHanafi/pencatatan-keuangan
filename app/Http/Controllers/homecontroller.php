<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;

class homecontroller extends Controller
{
    public function index()
    {
        // $user = auth()->user();

        // $ulasan = Why::all(); // Ambil data ulasan
        // $user = Account::all();
        $tes = Benefit::all();
        $data = [
            'title' => 'bene',
            'breadcrumbs' => [
                'bene' => '#',
            ],

            'bene' => $tes,// Tambahkan ulasan ke dalam array data
            'content' => 'benefit.index',
        ];
        // dd($data);
        return view("welcome", $data);
    }
}
