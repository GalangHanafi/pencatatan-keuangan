@include('transaction.edit.include.tab')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        {{-- {{ $transaction }}
        {{ $categories }}
        {{ $accounts }} --}}
        <form action="{{ route('transaction.update', $transaction) }}" method="POST">
            @csrf
            @method('PUT')
        </form>
    </div>
</div>
