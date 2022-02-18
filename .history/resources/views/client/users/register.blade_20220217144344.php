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
        <input type="text" class="form-control item" id="username" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" id="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
    </div>
    <div class="form-group">
        <input type="text" class="form-control item" id="birth-date" placeholder="Birth Date">
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-block btnSubmit">Create Account</button>
    </div>
</form>
@endsection