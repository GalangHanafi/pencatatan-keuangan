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
        $user = User::find(auth()->user()->id);

        $data = [
            'title' => 'Account',
            'breadcrumb' => [
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
            'breadcrumb' => [
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
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // authorization
        if ($user->id !== $request->user_id) {
            abort(403);
        }

        // validation

        // create account

        // return redirect()->to('account')->with('success', 'Account created successfully!');
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
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // authorization
        if ($user->id !== $account->user_id) {
            abort(403);
        }

        $data = [
            'title' => 'Edit Account',
            'breadcrumb' => [
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
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // authorization
        if ($user->id !== $request->user_id) {
            abort(403);
        }

        // validation

        // update account

        // return redirect()->to('account')->with('success', 'Account updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        // current user
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // authorization
        if ($user->id !== $account->user_id) {
            abort(403);
        }

        $account->delete();
        return redirect()->route('account.index');
    }
}
