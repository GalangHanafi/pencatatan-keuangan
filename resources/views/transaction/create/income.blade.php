@include('transaction.create.include.tab')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
        {{-- {{ $categories }}
        {{ $accounts }} --}}
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
        </form>
    </div>
</div>
