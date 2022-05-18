@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="content mt-2">
                <div class="content">
                    @foreach ($news as $value)
                    <div class="card border-light mb-3 border border-light shadow-sm p-3 rounded">
                        <div class="card-body">
                            <div class="item-content">
                                <a href="{{ route('client.news-detail', ['news'=>$value->matin]) }}" class="item-link d-flex justify-content-start align-items-center text-decoration-none">
                                    <div class="me-3">
                                        <img src="{{ asset('assets/uploads/news/'.$value->anh) }}" alt="" class="cart_item-img">
                                    </div>
                                    <div class="d-flex justify-content-start align-items-start flex-column">
                                        <div class="text-black text-bold" style="font-weight: 600">{{ $value->tieude }}</div>
                                        <div class="text-mute"> Ngày {{ date_format(date_create($value->ngaydang),'d-m-Y H:i:s') }}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-7">
            {{ $news->appends(request()->all())->links() }}
        </div>
    </div>
</div>

@endsection