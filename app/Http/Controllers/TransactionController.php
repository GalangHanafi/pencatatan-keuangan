<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // Start with transactions query
        $transactionsQuery = $user->transactions()->orderBy('date', 'desc');

        // Filtering
        if ($request->filled('category_id')) {
            $transactionsQuery->where('category_id', $request->category_id);
        }
        if ($request->filled('account_id')) {
            $transactionsQuery->where('account_id', $request->account_id);
        }
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $transactionsQuery->whereBetween('date', [$request->start_date, $request->end_date]);
        } elseif ($request->filled('start_date')) {
            $transactionsQuery->where('date', '>=', $request->start_date);
        } elseif ($request->filled('end_date')) {
            $transactionsQuery->where('date', '<=', $request->end_date);
        }
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $transactionsQuery->where(function ($query) use ($search) {
                $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"]);
            });
        }

        // Get filtered and sorted transactions
        $transactions = $transactionsQuery->get();

        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => [
                'Transaction' => "#",
            ],
            'transactions' => $transactions,
            'categories' => $user->categories,
            'accounts' => $user->accounts,
            'content' => 'transaction.index',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    public function exportPDF(Request $request)
    {
        $query = Transaction::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('account_id') && $request->account_id) {
            $query->where('account_id', $request->account_id);
        }

        if ($request->has('start_date') && $request->start_date) {
            $query->whereDate('date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->whereDate('date', '<=', $request->end_date);
        }

        $transactions = $query->get();
        $filters = [
            'search' => $request->search,
            'category_name' => $request->category_id ? Category::find($request->category_id)->name : null,
            'account_name' => $request->account_id ? Account::find($request->account_id)->name : null,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        $details = ['title' => 'Transaction Report', 'transactions' => $transactions];

        $pdf = FacadePdf::loadView('transaction.pdf', compact('transactions', 'filters'));

        return $pdf->download('transaction.pdf');
    }

    /**
     * Show the form for creating a new resource type expense.
     */
    public function createExpense()
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        $data = [
            'title' => 'Create Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Create' => "#",
                'Expense' => "#",
            ],
            'categories' => $user->categories()->where('type', 'expense')->get(),
            'accounts' => $user->accounts,
            'content' => 'transaction.create.expense',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for creating a new resource type income.
     */
    public function createIncome()
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        $data = [
            'title' => 'Create Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Create' => "#",
                'Income' => "#",
            ],
            'categories' => $user->categories()->where('type', 'income')->get(),
            'accounts' => $user->accounts,
            'content' => 'transaction.create.income',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        $request->merge([
            'amount' => str_replace('.', '', $request->amount),
        ]);

        // validation
        $data = $request->validate([
            'account_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable|string',
            'type' => 'in:income,expense',
            'amount' => 'required|numeric|min:0|digits_between:1,10',
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
     * Show the form for editing the specified resource type expense.
     */
    public function editExpense(Transaction $transaction)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        $data = [
            'title' => 'Edit Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Edit' => "#",
                'Expense' => "#",
            ],
            'transaction' => $transaction,
            'categories' => $user->categories()->where('type', 'expense')->get(),
            'accounts' => $user->accounts,
            'content' => 'transaction.edit.expense',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    /**
     * Show the form for editing the specified resource type income.
     */
    public function editIncome(Transaction $transaction)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        $data = [
            'title' => 'Edit Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Edit' => "#",
                'Income' => "#",
            ],
            'transaction' => $transaction,
            'categories' => $user->categories()->where('type', 'income')->get(),
            'accounts' => $user->accounts,
            'content' => 'transaction.edit.income',
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

        $request->merge([
            'amount' => str_replace('.', '', $request->amount),
        ]);

        // validation
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable|string',
            'type' => 'in:income,expense',
            'amount' => 'required|numeric|min:0|digits_between:1,10',
            'date' => 'required|date',
        ]);

        // check account_id and category_id is related to user
        $account = $user->accounts->find($data['account_id']);
        $category = $user->categories->find($data['category_id']);
        if (!$account || !$category) {
            return redirect()->back()->with('error', 'Account or Category not found!');
        }

        // Logic for updating account balance
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

        // Update the transaction details
        $transaction->update($data);

        // Redirect to transaction index
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

    public function trash()
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // get all transactions for logged in user, ordered by most recent
        $transactions = $user->transactions()->onlyTrashed()->orderBy('deleted_at', 'desc')->get();

        $data = [
            'title' => 'Deleted Transaction',
            'breadcrumbs' => [
                'Transaction' => route('transaction.index'),
                'Trash' => "#",
            ],
            'transactions' => $transactions,
            'content' => 'transaction.trash',
        ];

        return view("admin.layouts.wrapper", $data);
    }

    public function restore(Transaction $transaction)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        // restore transaction
        $transaction->restore();

        return redirect()->route('transaction.trash')->with('success', 'Transaction restored successfully!');
    }

    public function destroyPermanently(Transaction $transaction)
    {
        // logged in user
        $user = auth()->user();
        $user = User::find($user->id);

        // authorize user
        if ($user->id !== $transaction->user_id) {
            abort(403);
        }

        // delete transaction
        $transaction->forceDelete();

        return redirect()->route('transaction.trash')->with('error', 'Transaction permanently deleted!');
    }
}
