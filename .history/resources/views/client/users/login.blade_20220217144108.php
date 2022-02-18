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
        <input type="text" class="form-control item" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control item" id="password" placeholder="Password">
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-block btnSubmit">Login</button>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-block btnBack">Back</button>
    </div>
    <div class="form-group">
        <small>You don't have accout?&nbsp;<span class="text-danger">Sign up</span></small>
    </div>

</form>
@endsection