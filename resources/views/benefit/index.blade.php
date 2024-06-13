<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Our {{ $title }}</h5>
            <a href="{{ route('benefit.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-plus me-2"></i>
                Create New
            </a>
        </div>
        {{-- list of accounts --}}
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Benefit</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- looping custom accounts --}}
                    @forelse ($benefit as $bene)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">

                                    <span>{{ $bene->benefit }}</span>
                                </div>
                            </td>

                            <td class="border-bottom-0">
                                {{-- edit button --}}
                                <a href="{{ route('benefit.edit', $bene) }}" class="btn btn-primary btn-sm">Edit</a>
                                {{-- delete button --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
        data-bs-target="#deleteModal{{ $bene->id }}">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $bene->id }}" tabindex="-1"
     aria-labelledby="deleteModal{{ $bene->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal{{ $bene->id }}Label">Are You Sure?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this benefit?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('benefit.destroy', $bene->id) }}" method="POST" class="d-inline-block">
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
