<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">Your {{ $title }}</h5>
            <a href="{{ route('faq.create') }}" class="btn btn-primary mb-3">
                <i class="ti ti-plus me-2"></i>
                Create New
            </a>
        </div>
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
                            <h6 class="fw-semibold mb-0">question</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">answer</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- looping custom accounts --}}
                    @forelse ($faqs as $faq)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$faq->question }}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$faq->answer }}</p>
                            </td>
                            <td class="border-bottom-0">
                                {{-- edit button --}}
                                <a href="{{ route('faq.edit', $faq) }}" class="btn btn-primary btn-sm">Edit</a>
                                {{-- delete button --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $faq->id }}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $faq->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal{{ $faq->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModal{{ $faq->id }}Label">
                                                    Are You Sure?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 fw-bold text-danger">
                                                    {{ $faq->question }}
                                                </p>
                                                <p class=>Do you really want to delete this faq?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('faq.destroy', $faq->id) }}"
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
                    {{-- end looping custom faqs --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
