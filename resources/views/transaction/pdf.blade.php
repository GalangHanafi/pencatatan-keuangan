<!DOCTYPE html>
<html>

<head>
    <title>Transaction Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .filters {
            margin-bottom: 20px;
        }

        .filters p {
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>

<body>
    <h2>Transaction Report</h2>

    <div class="filters">
        {{-- <h3>Filters Used:</h3> --}}
        @if ($filters['search'])
            <p><strong>Filters Used Search:</strong> {{ $filters['search'] }}</p>
        @endif
        @if ($filters['category_name'])
            <p><strong>Filters Used Category:</strong> {{ $filters['category_name'] }}</p>
        @endif
        @if ($filters['account_name'])
            <p><strong>Filters Used Account:</strong> {{ $filters['account_name'] }}</p>
        @endif
        @if ($filters['start_date'])
            <p><strong>Filters Used Start Date:</strong> {{ $filters['start_date'] }}</p>
        @endif
        @if ($filters['end_date'])
            <p><strong>Filters Used End Date:</strong> {{ $filters['end_date'] }}</p>
        @endif
        {{-- @if ($filters[' '])
            <p><strong>Semua</strong></p>
        @endif --}}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Sumber</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->account->name }}</td>
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                    <td>{{ $transaction->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
