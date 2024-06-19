<h2>{{ $title }}</h2>

@if (!auth()->user()->is_superadmin)
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
@else
<div class="text-center py-5">
    <h1> Welcome {{auth()->user()->name}}</h1>
</div>
@endif
