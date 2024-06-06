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
        <h2>Dashboard</h2>

        <div class="row">
            <!-- Card Total Saldo -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Saldo</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format($totalBalance, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>

            <!-- Card Total Pemasukan -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Pemasukan</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format($totalIncome, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>

            <!-- Card Total Pengeluaran -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Pengeluaran</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp {{ number_format($totalExpense, 2, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten lain dari view -->
        
    </div>

    <!-- Tambahkan JS Bootstrap 5 -->
    
</body>
</html>