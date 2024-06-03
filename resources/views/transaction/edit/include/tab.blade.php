<ul class="nav nav-pills mb-3">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('transaction.edit.expense') ? 'active' : '' }}" aria-current="page"
            href="{{ route('transaction.edit.expense', $transaction) }}">expense</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('transaction.edit.income') ? 'active' : '' }}"
            href="{{ route('transaction.edit.income', $transaction) }}">income</a>
    </li>
</ul>
