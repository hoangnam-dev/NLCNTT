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
        <input type="text" class="form-control item" name="customer_name" placeholder="Username">
        @error('customer_name')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" name="customer_pass" placeholder="Password">
        @error('customer_pass')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="customer_email" placeholder="Email">
        @error('customer_email')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="customer_phone" placeholder="Phone Number">
        @error('customer_phone')
          <p class="mb-2 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" name="customer_address" placeholder="Address">
        @error('customer_address')
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