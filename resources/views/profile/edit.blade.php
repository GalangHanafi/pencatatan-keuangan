@if (session('status'))
    {{-- replace "-" with " " in session('status')  --}}
    @php
        $status = str_replace('-', ' ', session('status'));
    @endphp
    <x-alert type="success" class="text-capitalize"> {{$status}} </x-alert>
@endif

@include('profile.partials.update-photo-form')
@include('profile.partials.update-profile-information-form')
@include('profile.partials.update-password-form')
@include('profile.partials.delete-user-form')
