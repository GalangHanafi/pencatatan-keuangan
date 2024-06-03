<ul class="nav nav-pills mb-3">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('transaction.create.expense') ? 'active' : '' }}" aria-current="page"
            href="{{ route('transaction.create.expense') }}">expense</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('transaction.create.income') ? 'active' : '' }}"
            href="{{ route('transaction.create.income') }}">income</a>
    </li>
</ul>
