<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4 text-danger">Your {{ $title }}</h5>
        </div>
        {{-- list of transactions --}}
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
                            <h6 class="fw-semibold mb-0">Type</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Amount</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Date</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Deleted Date</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- looping custom transactions --}}
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $transaction->account->name }}</p>
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
                                <p class="mb-0 fw-normal">{{ $transaction->type }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">Rp. {{ number_format($transaction->amount, 0, ',', '.') }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $transaction->date }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $transaction->deleted_at }}</p>
                            </td>
                            <td class="border-bottom-0">
                                {{-- restore button --}}
                                <form class="d-inline-block" action="{{ route('transaction.trash.restore', $transaction) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                {{-- delete button --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $transaction->id }}">
                                    Delete Permanently
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $transaction->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal{{ $transaction->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5"
                                                    id="deleteModal{{ $transaction->id }}Label">Are You Sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 fw-bold text-danger">
                                                    <span><i class="{{ $transaction->icon }} mx-2"></i></span>
                                                    {{ $transaction->name }}
                                                </p>
                                                <p class=>Do you really want to delete this transaction?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form
                                                    action="{{ route('transaction.trash.destroyPermanently', $transaction) }}"
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
                            <td class="border-bottom-0 text-center" colspan="4">
                                <h2 class="fw-semibold my-5">No {{ $title }} found</h2>
                            </td>
                        </tr>
                    @endforelse
                    {{-- end looping custom transactions --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
