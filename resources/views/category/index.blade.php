<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Your {{ $title }}</h5>
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-plus me-2"></i>
                Create New
            </a>
        </div>
        {{-- list of categories --}}
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        {{-- number --}}
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"></h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Icon</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- looping custom categories --}}
                    @forelse ($customCategories as $customCategory)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <i class="{{ $customCategory->icon }}"></i>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $customCategory->name }}</p>
                            </td>
                            <td class="border-bottom-0">
                                {{-- edit button --}}
                                <a href="{{ route('category.edit', $customCategory->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                {{-- delete button --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel">Are You Sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 fw-bold text-danger">
                                                    <span><i class="{{ $customCategory->icon }} mx-2"></i></span>
                                                    {{ $customCategory->name }}
                                                </p>
                                                <p class=>Do you really want to delete this category?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('category.destroy', $customCategory->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <form action="{{ route('category.destroy', $customCategory->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border-bottom-0 text-center" colspan="4">
                                <h2 class="fw-semibold my-5">No custom {{ $title }} found</h2>
                            </td>
                        </tr>
                    @endforelse
                    {{-- end looping custom categories --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Default {{ $title }}</h5>
        </div>
        {{-- list of categories --}}
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        {{-- number --}}
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"></h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Icon</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"></h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- looping default categories --}}
                    @foreach ($defaultCategories as $defaultCategory)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <i class="{{ $defaultCategory->icon }}"></i>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $defaultCategory->name }}</p>
                            </td>
                            <td class="border-bottom-0"></td>
                        </tr>
                    @endforeach
                    {{-- end looping default categories --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
