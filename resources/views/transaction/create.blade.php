<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <x-icon-select-modal :$icons />
                <x-input-error :messages="$errors->get('icon')" class="text-center" />

                <div class="mb-3">
                    <label for="name" class="form-label"> Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Category Type</label>
                    <select name="type" class="form-select">
                        <option value="" disabled selected>Choose Type</option>
                        <option value="expense">Expense</option>
                        <option value="income">Income</option>
                        {{-- <option value="saving">Saving</option> --}}
                    </select>
                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>