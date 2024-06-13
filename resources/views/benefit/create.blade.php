<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('benefit.store') }}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3">
                    <label for="benefit" class="form-label">Create New Benefit</label>
                    <textarea class="form-control" name="benefit" id="benefit" required></textarea>
                    <x-input-error :messages="$errors->get('benefit')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
