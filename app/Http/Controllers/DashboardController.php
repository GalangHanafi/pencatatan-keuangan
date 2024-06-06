<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction; // Tambahkan impor model Transaction

class DashboardController extends Controller
{
    public function index()
    {
        // Pengguna saat ini
        $user = auth()->user();

        // Hitung total saldo dari semua akun pengguna yang sedang login
        $totalBalance = $user->accounts()->sum('balance');

        // Hitung total income (pemasukan)
        $totalIncome = $user->transactions()
            ->where('type', 'income')
            ->sum('amount');

        // Hitung total expense (pengeluaran)
        $totalExpense = $user->transactions()
            ->where('type', 'expense')
            ->sum('amount');

        $data = [
            'title'         => 'Dashboard Test',
            'totalBalance'  => $totalBalance,
            'totalIncome'   => $totalIncome,
            'totalExpense'  => $totalExpense,
            'content'       => 'dashboard.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }
}