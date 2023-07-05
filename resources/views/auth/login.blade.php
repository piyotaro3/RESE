 @extends('layouts\layout')

 @section('styles')
 <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
 @endsection

 <x-auth-session-status class="mb-4" :status="session('status')" />

 @section('title')
     ログイン
 @endsection

 @section('content')
     <form action="/login" method="POST">
         @csrf
         <div class="content_area">
             <div class="content">
                 <div class="content_blue">
                     <p class="content_title">login</p>
                 </div>
                 <div class="form_area">
                     <div class="icon_email">
                         <img src="{{ asset('img/ifn0636.png') }}" style="margin-bottom:-3%">
                         <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                         @error('email')
                             <p>{{ $message }}</p>
                         @enderror
                     </div>
                     <div class="icon_password">
                         <img src="{{ asset('img/カギアイコン.png') }}" style="margin-bottom:-3%">
                         <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                         @error('password')
                             <p>{{ $message }}</p>
                         @enderror
                     </div>
                 </div>
                 <div class="button_area">
                     <input type="submit" value="ログイン" class="button">
                 </div>
             </div>
         </div>
     </form>
 @endsection
