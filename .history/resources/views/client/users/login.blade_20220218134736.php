@extends('client.layouts.master2')
@section('title')
    {{ $title }}
@endsection
@section('form-content')
<form>
    <div class="form-icon">
        <span><i class="icon icon-user"></i></span>
    </div>
    <div class="form-group">
        <input type="text" name="user_email" class="form-control item" id="email" placeholder="Email">
    </div>
    @error('user_email')
      <p class="mb-2 text-danger">{{ $message }}</p>
    @enderror
    <div class="form-group">
        <input type="password" name="user_password" class="form-control item" id="password" placeholder="Password">
    </div>
    @error('user_password')
      <p class="mb-2 text-danger">{{ $message }}</p>
    @enderror
    <div class="form-group">
        <button type="button" class="btn btn-block btnSubmit">Login</button>
    </div>
    <div class="form-group">
        <a href="{{ route('home') }}" class="btn btn-block btnBack">Back</a>
    </div>
    <div class="form-group">
        <h6>You don't have account?&nbsp;<a href="{{ route('user.register') }}" class="text-danger">Sign Up</a></h6>
    </div>

</form>
@endsection