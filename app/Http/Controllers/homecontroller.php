<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Why;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index()
    {
        // $user = auth()->user();

        $ulasan = Why::all(); // Ambil data ulasan
        $user = Account::all();

        $data = [
            'title' => 'Why',
            'breadcrumbs' => [
                'Why' => '#',
            ],
            'hehe' => $user,
            'ulasan' => $ulasan, // Tambahkan ulasan ke dalam array data
            'content' => 'why.index',
        ];
        // dd($data);
        return view("welcome", $data);
    }
}
