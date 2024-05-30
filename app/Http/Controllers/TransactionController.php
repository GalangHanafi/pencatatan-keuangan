<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // logged in user
        $userId = auth()->user()->id;
        $user = User::find($userId);


        // get all transactions for logged in user, ordered by most recent
        $transactions = $user->transactions->sortBy('date');

        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => [
                'Transaction' => "#",
            ],
            'transactions' => $transactions,
            'content' => 'transaction.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        // get transaction account
        $transactionAccount = $user->accounts->where('id', $transaction->account_id)->first();

        // if type is income, subtract from user's balance
        if ($transaction->type === 'income') {
            $updatedAccount = $transactionAccount->balance - $transaction->amount;
        }

        // if type is expense, add to user's balance
        if ($transaction->type === 'expense') {
            $updatedAccount = $transactionAccount->balance + $transaction->amount;
        }

        // update transaction account
        $transactionAccount->update([
            'balance' => $updatedAccount
        ]);

        // delete transaction
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
