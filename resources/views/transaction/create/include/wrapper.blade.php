@include('transaction.create.include.tab')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        {{-- {{ $categories }}
        {{ $accounts }} --}}
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            @yield('content')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input autocomplete="off" type="text" class="form-control" name="name" id="name" required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id">
                    <option value="">select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="account_id" class="form-label">Account</label>
                <select class="form-select" name="account_id" id="account_id">
                    <option value="">select a account</option>
                    @foreach ($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input autocomplete="off" type="text" class="form-control mask-money" name="amount" id="amount" required
                        aria-label="Amount" aria-describedby="basic-addon1">
                </div>
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input autocomplete="off" type="date" class="form-control" name="date" id="date" required>
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
