<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kantongku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
        }

        .header img {
            width: 180px;
        }

        .filters, .summary, .transaction-list {
            margin-top: 20px;
        }

        h2, h4 {
            margin: 0 0 10px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .col-6 {
            grid-column: span 1;
        }

        .text-danger {
            color: #dc3545;
        }

        .text-success {
            color: #28a745;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        table th {
            background-color: #f1f1f1;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .my-5 {
            margin: 3rem 0;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .gap-2 {
            gap: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Your Transaction Report</h2>
        </div>

        <div class="row filters">
            <div class="col-6">
                <h4>Filters</h4>
                <div class="row">
                    @if ($filters['search'])
                    <p class="col-6"><strong>Search:</strong> {{ $filters['search'] }}</p>
                    @endif
                    @if ($filters['category_name'])
                    <p class="col-6"><strong>Category:</strong> {{ $filters['category_name'] }}</p>
                    @endif
                    @if ($filters['account_name'])
                    <p class="col-6"><strong>Account:</strong> {{ $filters['account_name'] }}</p>
                    @endif
                    @if ($filters['start_date'])
                    <p class="col-6"><strong>Start Date:</strong> {{ $filters['start_date'] }}</p>
                    @endif
                    @if ($filters['end_date'])
                    <p class="col-6"><strong>End Date:</strong> {{ $filters['end_date'] }}</p>
                    @endif
                </div>
            </div>
            <div class="col-6">
                <h4>Summary</h4>
                <div class="row">
                    <p class="col-6"><strong>Total Expense:</strong>
                        <span class="text-danger"> +Rp. {{ number_format($totalExpense, 0, ',', '.') }} </span>
                    </p>
                    <p class="col-6"><strong>Total Income:</strong>
                        <span class="text-success"> +Rp. {{ number_format($totalIncome, 0, ',', '.') }} </span>
                    </p>
                    <p class="col-6"><strong>Summary:</strong>
                        <span class="{{ $totalIncome < $totalExpense ? 'text-danger' : 'text-success' }}">
                            {{ $totalIncome < $totalExpense ? '-' : '+' }}Rp.
                            {{ number_format($totalIncome, 0, ',', '.') }} </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="transaction-list">
            <h4>Transaction List</h4>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Source</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop Transaction --}}
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="{{ $transaction->account->icon }}"></i>
                                    <p class="mb-0">{{ $transaction->account->name }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="{{ $transaction->category->icon }}"></i>
                                    <span>{{ $transaction->category->name }}</span>
                                </div>
                            </td>
                            <td>{{ $transaction->name }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td class="text-right">
                                @if ($transaction->type == 'income')
                                <p class="mb-0 text-success">+ Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</p>
                                @else
                                <p class="mb-0 text-danger">- Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</p>
                                @endif
                            </td>
                            <td>{{ $transaction->date }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <h2 class="fw-semibold my-5">No {{ $title }} found</h2>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
