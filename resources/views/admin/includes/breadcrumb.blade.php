@isset($breadcrumbs)
    <nav aria-label="breadcrumbs">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @foreach ($breadcrumbs as $key => $url)
                @if ($url != '#')
                    <li class="breadcrumb-item"><a href="{{ $url }}">{{ $key }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $key }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endisset
