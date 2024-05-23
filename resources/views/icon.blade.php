<div class="mb-5">
    @foreach ($icons as $icon)
        <i class="{{ $icon->name }} display-1 rounded-circle bg-light"></i>
        {{-- active --}}
        <i class="{{ $icon->name }} display-1 rounded-circle bg-light border border-secondary"></i>
    @endforeach
</div>
