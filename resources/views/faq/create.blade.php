<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        <form action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3">
                    <label for="question" class="form-label">question</label>
                    <input type="text" class="form-control" name="question" id="question" required>
                    <x-input-error :messages="$errors->get('question')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <label for="answer" class="form-label">answer</label>
                    <input type="text" class="form-control" name="answer" id="answer" required>
                    <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                </div>
                

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
