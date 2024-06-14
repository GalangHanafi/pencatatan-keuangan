<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        </div>
        <form action="{{ route('account.update', $account) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <x-icon-select-modal :$icons :selected="$account" />
                <x-input-error :messages="$errors->get('icon')" class="text-center" />

                <div class="mb-3">
                    <label for="name" class="form-label">Edit account</label>
                    <input autocomplete="off" type="text" class="form-control" name="name" id="name"
                        value="{{ $account->name }}" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="balance" class="form-label">Edit Balance</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                        <input autocomplete="off" type="text" class="form-control mask-money" name="balance" id="balance"
                            value="{{ $account->balance }}" required aria-label="Balance"
                            aria-describedby="basic-addon1">
                    </div>
                    <x-input-error :messages="$errors->get('balance')" class="mt-2" />
                </div>

                <div class="mb-3">

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
