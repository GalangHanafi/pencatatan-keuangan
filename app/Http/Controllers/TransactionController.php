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
        $user = User::find($user->id);

        // get all transactions for logged in user, ordered by most recent
        $transactions = $user->transactions->sortByDesc('date');

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
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Create' => "#",
            ],
            'categories' => $user->categories,
            'accounts' => $user->accounts,
            'content' => 'transaction.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // loged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // validation
        $data = $request->validate([
            'account_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable|string',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // check account_id and category_id is related to user
        $account = $user->accounts->find($data['account_id']);
        $category = $user->categories->find($data['category_id']);
        if (!$account || !$category) {
            return redirect()->back()->with('error', 'Account or Category not found!');
        }

        // logic for updating account balance
        // if type is income, add account balance, else subtract account balance
        if ($data['type'] === 'income') {
            $account->balance += $data['amount'];
        } else {
            $account->balance -= $data['amount'];
        }
        $account->update([
            'balance' => $account->balance
        ]);

        // create transaction
        $user->transactions()->create($data);

        // redirect to transaction index
        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully!');
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
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Edit' => "#",
            ],
            'transaction' => $transaction,
            'categories' => $user->categories,
            'accounts' => $user->accounts,
            'content' => 'transaction.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // validation
        $data = $request->validate([
            'account_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'string',
            'type' => 'in:income,expense',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // check account_id and category_id is related to user
        $account = $user->accounts->find($data['account_id']);
        $category = $user->categories->find($data['category_id']);
        if (!$account || !$category) {
            return redirect()->back()->with('error', 'Account or Category not found!');
        }

        // logic for updating account balance
        $originalAmount = $transaction->amount;
        $originalType = $transaction->type;

        // Reverse the original transaction effect
        if ($originalType === 'income') {
            $account->balance -= $originalAmount;
        } else {
            $account->balance += $originalAmount;
        }

        // Apply the new transaction effect
        if ($data['type'] === 'income') {
            $account->balance += $data['amount'];
        } else {
            $account->balance -= $data['amount'];
        }

        // Save the updated account balance
        $account->update([
            'balance' => $account->balance
        ]);

        // update transaction
        $transaction->update($data);

        // redirect to transaction index
        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully!');
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

        // check account_id is related to user
        $account = $user->accounts->where('id', $transaction->account_id)->first();
        if (!$account) {
            return redirect()->route('transaction.index')->with('error', 'Account not found!');
        }

        // if type is income, subtract account balance
        if ($transaction->type === 'income') {
            $account->balance -= $transaction->amount;
        }
        // if type is expense, add account balance
        if ($transaction->type === 'expense') {
            $account->balance += $transaction->amount;
        }

        // update transaction account
        $account->update([
            'balance' => $account->balance
        ]);

        // delete transaction
        $transaction->delete();

        return redirect()->route('transaction.index');
    }
}
