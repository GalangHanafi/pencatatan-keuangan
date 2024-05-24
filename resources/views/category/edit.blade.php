<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon</label>
                    <select name="icon" id="icon" class="form-select" required>
                        <option value="" disabled>Select an Icon</option>
                        @foreach ($icons as $icon)
                            <option value="{{ $icon->name }}" {{ $icon->name == $category->icon ? 'selected' : '' }}>{{ $icon->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Category</label>
                    <input type="text" class="form-control" name="name" id="nama" value="{{ $category->name }}" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
