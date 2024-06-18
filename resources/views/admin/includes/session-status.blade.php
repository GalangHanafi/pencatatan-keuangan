@if (session('error'))
    <x-alert type="danger"> {{ session('danger') }} </x-alert>
@endif
@if (session('success'))
    <x-alert type="success"> {{ session('success') }} </x-alert>
@endif
@if (session('danger'))
    <x-alert type="danger"> {{ session('danger') }} </x-alert>
@endif
