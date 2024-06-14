<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
            <div>
                <a href="{{ route('transaction.export.pdf', request()->all()) }}" class="btn btn-success mb-3">
                    <i class="ti ti-download me-2"></i>
                    Export PDF
                </a>
                <a href="{{ route('transaction.trash') }}" class="btn btn-danger mb-3">
                    <i class="ti ti-trash me-2"></i>
                    Trash
                </a>
                <a href="{{ route('transaction.create.expense') }}" class="btn btn-primary mb-3">
                    <i class="ti ti-plus me-2"></i>
                    Create New
                </a>
            </div>
        </div>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('transaction.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="form-control" name="search" placeholder="Search transactions..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="account_id">
                        <option value="">Select Account</option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}"
                                {{ request('account_id') == $account->id ? 'selected' : '' }}>{{ $account->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="form-control bg-primary text-light">Filter</button>
                </div>
            </div>
        </form>

        {{-- transaction table --}}
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"></h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Source</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Category</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Amount</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Date</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop Transaction --}}
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="{{ $transaction->account->icon }} display-6"></i>
                                    <p class="mb-0 fw-normal">{{ $transaction->account->name }}</p>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="{{ $transaction->category->icon }} display-6"></i>
                                    <span>{{ $transaction->category->name }}</span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $transaction->name }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $transaction->description }}</p>
                            </td>
                            <td class="border-bottom-0">
                                @if ($transaction->type == 'income')
                                    <p class="mb-0 fw-normal text-success text-right">
                                        + Rp. {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </p>
                                @else
                                    <p class="mb-0 fw-normal text-danger text-right">
                                        - Rp. {{ number_format($transaction->amount, 0, ',', '.') }}
                                    </p>
                                @endif
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $transaction->date }}</p>
                            </td>
                            <td class="border-bottom-0">
                                {{-- Edit Button --}}
                                <a href="{{ $transaction->type == 'income' ? route('transaction.edit.income', $transaction) : route('transaction.edit.expense', $transaction) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                {{-- Delete Button --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $transaction->id }}">
                                    Hapus
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $transaction->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal{{ $transaction->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5"
                                                    id="deleteModal{{ $transaction->id }}Label">Are You Sure?
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 fw-bold text-danger">
                                                    <span><i class="{{ $transaction->icon }} mx-2"></i></span>
                                                    {{ $transaction->name }}
                                                </p>
                                                <p>Do you really want to delete this transaction?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ route('transaction.destroy', $transaction->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border-bottom-0 text-center" colspan="9">
                                <h2 class="fw-semibold my-5">No {{ $title }} found</h2>
                            </td>
                        </tr>
                    @endforelse
                    {{-- End Looping Transactions --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
