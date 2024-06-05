<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Icon;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // current user
        $user = auth()->user();

        $data = [
            'title' => 'Account',
            'breadcrumbs' => [
                'Account' => '#',
            ],
            'accounts' => $user->accounts()->get(),
            'content' => 'account.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Account',
            'breadcrumbs' => [
                'Account' => route('account.index'),
                'Create' => '#',
            ],
            'icons' => Icon::all(),
            'content' => 'account.create',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // hapus "." dari $request->balance
        $request->merge([
            'balance' => str_replace('.', '', $request->balance),
        ]);

        // Current user
        $user = auth()->user();

        // Validation
        $data = $request->validate([
            'name' => 'required|string',
            'balance' => 'required|min:0|numeric|digits_between:0,10',
            'icon' => 'required|string',
        ]);

        // Create account
        $account = $user->accounts()->create($data);

        // Get income other category
        $incomeOtherCategory = $user->categories()->where('type', 'income')->where('name', 'Other')->first();

        // Create transaction
        $user->transactions()->create([
            'account_id' => $account->id,
            'category_id' => $incomeOtherCategory->id,
            'name' => 'Initial Balance',
            'description' => 'Initial Balance for ' . $data['name'],
            'type' => 'income',
            'amount' => $data['balance'],
            'date' => date('Y-m-d'),
        ]);

        return redirect()->route('account.index')->with('success', 'Account created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        // current user
        $user = auth()->user();

        // authorization
        if ($user->id !== $account->user_id) {
            abort(403);
        }

        $data = [
            'title' => 'Edit Account',
            'breadcrumbs' => [
                'Account' => route('account.index'),
                'Edit' => '#',
            ],
            'icons' => Icon::all(),
            'account' => $account,
            'content' => 'account.edit',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        // hapus "." dari $request->balance
        $request->merge([
            'balance' => str_replace('.', '', $request->balance),
        ]);

        // Current user
        $user = auth()->user();

        // authorization
        if ($user->id !== $account->user_id) {
            abort(403);
        };

        // Validation
        $data = $request->validate([
            'name' => 'required|string',
            'balance' => 'required|min:0|numeric|digits_between:0,10',
            'icon' => 'required|string',
        ]);

        // update account [name, icon]
        $account->update([
            'name' => $data['name'],
            'icon' => $data['icon'],
        ]);

        // if balance is not added or subtracted then do nothing
        if ($data['balance'] === $account->balance) {
            return redirect()->route('account.index')->with('success', 'Account updated successfully!');
        }

        // check if balance is added or subtracted
        if ($data['balance'] > $account->balance) {
            $transactionType = 'income';
            $transactionDescription = 'Add ' . $data['balance'] - $account->balance . ' to ' . $data['name'];
            $transactionAmount = $data['balance'] - $account->balance;
            // transactionCategory will be "income other"
            $transactionCategory = $user->categories()->where('type', 'income')->where('name', 'Other')->first();
        } else {
            $transactionType = 'expense';
            $transactionDescription = 'Subtract ' . $account->balance - $data['balance'] . ' from ' . $data['name'];
            $transactionAmount = $account->balance - $data['balance'];
            // transactionCategory will be "expense other"
            $transactionCategory = $user->categories()->where('type', 'expense')->where('name', 'Other')->first();
        }

        // create transaction for updated account
        $user->transactions()->create([
            'account_id' => $account->id,
            'category_id' => $transactionCategory->id,
            'name' => 'Update ' . $data['name'] . ' Account',
            'description' => $transactionDescription,
            'type' => $transactionType,
            'amount' => $transactionAmount,
            'date' => date('Y-m-d'),
        ]);

        // update account [balance]
        $account->update([
            'balance' => $data['balance'],
        ]);

        return redirect()->route('account.index')->with('success', 'Account updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        // current user
        $user = auth()->user();

        // authorization
        if ($user->id !== $account->user_id) {
            abort(403);
        }

        // delete account
        $account->delete();

        return redirect()->route('account.index');
    }
}
