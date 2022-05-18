@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title mt-3">
                <h3 class="mb-1">{{ $news->tieude }}</h3>
                <p class="text-muted">Ngày đăng: {{ date_format(date_create($news->ngaydang),'d-m-Y H:i:s') }}</p>
            </div>
            <hr class="mb-3">
            <div class="content mb-3">
                <div class="content">
                    {!! $news->noidung !!}
                </div>
            </div>
        </div>
    </div>
@endsection