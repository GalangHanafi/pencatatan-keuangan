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
        $user = auth()->user();

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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // loged in user

        // authorize user

        // if type is income, add account balance

        // if type is expense, subtract account balance

        // update account balance

        // create transaction

        // redirect to transaction index
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
        // loged in user

        // authorize user

        // if type is income, add account balance

        // if type is expense, subtract account balance

        // update account balance

        // update transaction

        // redirect to transaction index
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // logged in user
        $user = auth()->user();

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        // get account where transaction belongs
        $account = $user->accounts->where('id', $transaction->account_id)->first();
        // if type is income, subtract account balance
        if ($transaction->type === 'income') {
            $updatedBalance = $account->balance - $transaction->amount;
        }
        // if type is expense, add account balance
        if ($transaction->type === 'expense') {
            $updatedBalance = $account->balance + $transaction->amount;
        }

        // update transaction account
        $account->update([
            'balance' => $updatedBalance
        ]);

        // delete transaction
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
