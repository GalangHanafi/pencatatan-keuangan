<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Tambahkan CSS Bootstrap 5 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>{{ $title }}</h2>

        <div class="row">
            <!-- Card Total  -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Balance</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format($totalBalance, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>

            <!-- Card Total Income -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Income</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format($totalIncome, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>

            <!-- Card Total Expense -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Expense</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format($totalExpense, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
