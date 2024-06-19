<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Your {{ $title }}</h5>
            <a href="{{ route('reminder.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-plus me-2"></i>
                Create New
            </a>
        </div>
        {{-- list of reminders --}}
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        {{-- number --}}
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"></h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Frequency</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Next Reminder</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- looping  reminders --}}
                    @forelse ($reminders as $reminder)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $reminder->name }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal text-capitalize">
                                    @if ($reminder->frequency != 'none')
                                        Every
                                    @else
                                        none
                                    @endif
                                    @if ($reminder->frequency == 'week')
                                        {{ \Carbon\Carbon::parse($reminder->date)->dayName }}
                                    @elseif ($reminder->frequency == 'month')
                                        {{ date('d', strtotime($reminder->date)) }}th
                                    @elseif ($reminder->frequency == 'year')
                                        {{ date('d F', strtotime($reminder->date)) }}
                                    @endif
                                </p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal text-capitalize">
                                    {{ date('d F Y', strtotime($reminder->date)) }}</p>
                            </td>
                            <td class="border-bottom-0">
                                {{-- edit button --}}
                                <a href="{{ route('reminder.edit', $reminder) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                {{-- delete button --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $reminder->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $reminder->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal{{ $reminder->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModal{{ $reminder->id }}Label">
                                                    Are You Sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 fw-bold text-danger">
                                                    <span><i class="{{ $reminder->icon }} mx-2"></i></span>
                                                    {{ $reminder->name }}
                                                </p>
                                                <p>Do you really want to delete this reminder?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('reminder.destroy', $reminder) }}"
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
                    {{-- end looping  reminders --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
