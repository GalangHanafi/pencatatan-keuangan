<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        </div>
        <form action="{{ route('account.update', $account) }}" method="POST">
            @csrf
            @method('PUT')


        </form>
    </div>
</div>
