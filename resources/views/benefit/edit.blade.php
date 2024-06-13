<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        </div>
        <form action="{{ route('benefit.update', $benefit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3">
                    <label for="benefit" class="form-label">Edit Benefit</label>
                    <textarea class="form-control" name="benefit" id="benefit" required>{{ $benefit->benefit }}</textarea>
                    <x-input-error :messages="$errors->get('benefit')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
