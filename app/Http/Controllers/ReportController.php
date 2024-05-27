<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Example data
        $data = [
            'balance' => 30151,
            'sales' => 20001,
            'totalIncome' => 47200,
            'costOfGoodsSold' => 16500,
            'grossProfit' => 30700,
            'operatingCost' => 10970,
            'operatingProfit' => 19730,
            'taxes' => 5001,
            'netProfit' => 12300,
        ];

        return view('reports.index', $data);
    }
}
