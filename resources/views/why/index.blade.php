@if (auth()->user()->is_superadmin)
    <div class="card">
        <div class="card-body">
            {{-- list of accounts --}}
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
                                <h6 class="fw-semibold mb-0">Review</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- looping custom accounts --}}
                        @forelse ($ulasan as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $item->content }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    {{-- edit button --}}
                                    {{-- <a href="{{ url('why/' . $item->id . '/edit') }}"
                                        class="btn btn-primary btn-sm">Edit</a> --}}
                                    {{-- delete button --}}
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModal{{ $item->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="deleteModal{{ $item->id }}Label">
                                                        Are You Sure?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="fs-5 fw-bold text-danger">
                                                        {{ $item->content }}
                                                    </p>
                                                    <p>Do you really want to delete this review?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('why.destroy', $item->id) }}" method="POST"
                                                        class="d-inline-block">
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
                        {{-- end looping custom accounts --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="card">
        <div class="card-body">
            @if ($userReview)
                <form action="{{ route('why.update', $userReview->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <div class="col-sm-10">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Ulasan</label>
                            <textarea type="text" class="form-control" name="content" id="content" required>{{ $userReview->content }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            @else
                <form action="{{ url('why') }}" method="POST">
                    @csrf
                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <div class="col-sm-10">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Ulasan</label>
                            <textarea type="text" class="form-control" name="content" id="content" required></textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            @endif

        </div>
    </div>
@endif
