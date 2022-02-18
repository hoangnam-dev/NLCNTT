@extends('client.layouts.master2')
@section('title')
    {{ $title }}
@endsection
@section('form-content')
<form action="{{ route('user.register') }}" method="POST">
    @csrf
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="username" placeholder="Username">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" id="password" placeholder="Password">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="email" placeholder="Email">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="birth-date" placeholder="Address">
        @error('user_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-block btnSubmit">Create Account</button>
    </div>
    <div class="form-group">
        <h6>You have account?&nbsp;<a href="{{ route('user.login') }}" class="text-danger">Sign In</a></h6>
    </div>
</form>
@endsection