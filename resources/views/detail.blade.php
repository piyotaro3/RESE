@extends('layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/detail.css') }}">
@endsection

@section('content')
    @foreach ($shops as $shop)
        <p>店舗名{{ $shop->name }}</p>
        <p>{{ $shop->getarea() }}{{ $shop->getGenre() }}</p>
        <p>{{ $shop->detail }}</p>
    @endforeach
@endsection
