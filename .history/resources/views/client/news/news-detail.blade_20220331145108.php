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
                    <img src="{{ asset('userfiles/images/xiaomi-redmi-note-10s.jpg') }}" alt="" style="width: 100px">
                    <img alt="" src="http://localhost/userfiles/images/xiaomi-redmi-note-10s.jpg" style="width:100px" />
                    <hr class="my-5">
                    {!! $news->noidung !!}
                    {{-- {{ $news->noidung }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection