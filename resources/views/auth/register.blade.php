@extends('layouts\layout')

@section('title')
    会員登録
@endsection
@section('form_title')
    Registration
@endsection
@section('user')
    <div class="icon_user">
        <img src="{{ asset('img/人物アイコン.png') }}">
        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif
    </div>
@endsection
@section('register')
@endsection
@include('layouts.header')

@include('layouts.form')
