@include('transaction.edit.include.tab')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            @yield('content')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input autocomplete="off" type="text" class="form-control" name="name" id="name"
                    value="{{ old('name', $transaction->name) }}" required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $transaction->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="account_id" class="form-label">Account</label>
                <input autocomplete="off" type="text" class="form-control" name="account" id="account"
                    value="{{ old('account', $transaction->account->name) }}" disabled>
                <x-input-error :messages="$errors->get('account_id')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input autocomplete="off" type="text" class="form-control mask-money" name="amount"
                        id="amount" value="{{ old('amount', $transaction->amount) }}" required aria-label="Amount"
                        aria-describedby="basic-addon1">
                </div>
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input autocomplete="off" type="date" class="form-control" name="date" id="date"
                    value="{{ old('date', $transaction->date) }}" required>
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description">{{ old('description', $transaction->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
