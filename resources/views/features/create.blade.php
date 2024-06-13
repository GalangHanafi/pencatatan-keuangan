<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('features.store') }}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <input type="text" class="form-control" name="icon" id="icon" required>
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>
                

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control" name="description" id="description" required></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
