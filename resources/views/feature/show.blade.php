<!-- resources/views/features/show.blade.php -->
@extends('layout')

@section('content')
    <h1>{{ $feature->name }}</h1>
    <p>{{ $feature->description }}</p>
    <a href="{{ route('features.index') }}">Kembali ke Daftar</a>
@endsection
