<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ url('category') }}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="mb-3 row">
                    <label for="icon" class="col-sm-2 col-form-label">ICON</label>
                    <div class="col-sm-10">
                        <select name="icon" id="icon" class="form-control">
                            <option value="" disabled>Icon</option>
                            @foreach($icons as $icon)
                                <option value="{{ $icon->name }}">{{ $icon->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Category</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="nama" required>
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
