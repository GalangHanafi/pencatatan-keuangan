<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{route('account.store')}}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <x-icon-select-modal :$icons />
                <x-input-error :messages="$errors->get('icon')" class="text-center" />

                <div class="mb-3">
                    <label for="name" class="form-label">Create account</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="balance" class="form-label">Balance</label>
                    <input type="text" class="form-control" name="balance" id="balance" required>
                    <x-input-error :messages="$errors->get('balance')" class="mt-2" />
                </div>

                <div class="mb-3">

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
        <script>
            console.log('js nyambung');
            $(document).ready(function($){
                $('#balance').maskMoney({
                    prefix: 'Rp ',         // Simbol mata uang di depan
                    allowNegative: false,  // Tidak mengizinkan nilai negatif
                    thousands: '.',        // Pemisah ribuan
                    decimal: ',',          // Pemisah desimal
                    affixesStay: true ,     // Tetap menampilkan prefix
                    precision: 0,           //angka di belakang ribuan ilang
                });
            });
            </script>
    </div>
</div>
