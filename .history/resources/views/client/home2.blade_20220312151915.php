@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
{{-- Slide --}}
@include('client.blocks.slide')
{{-- Products --}}
<div class="container mt-3">
  <div class="row">
    <h2 class="list_product-title">Khuyến mãi</h2>
    <div class="product_group mt-3">
      <div class="row">
        @foreach ($sale_prds as $value)
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product">
            <a href="{{ route('client.product-detail', ['masp'=>$value->masp]) }}" class="product-img">
              <div class="card-product_img"
                style="background-image: url('{{ asset('assets/uploads/products/'.$value->avatar)}}');">
              </div>
            </a>
            <div class="card-body">
              <h5 class="card-title product_name">{{ $value->tensp }}</h5>
              <div class="d-flex justify-content-between align-items-center">
                <span class="card-text new-price text-danger">{{ number_format($value->giaban - (($value->giaban *  $value->giatri)/100),'0',',','.') }} VNĐ</span>
                {{-- @if ($value->giatri!==0) --}}
                <span class="card-text old-price"> {{ number_format($value->giaban,'0',',','.') }} VNĐ</span>
                {{-- @endif --}}
              </div>
              <div class="text-center mt-3">
                <a href="{{ route('client.product-detail', ['masp'=>$value->masp]) }}" class="btn btn-outline-warning btn-detail">Chi tiết</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row">
    <h2 class="list_product-title">Nổi bật</h2>
    <div class="product_group mt-3">
      <div class="row">
        @foreach ($hot_prds as $value)
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card card-product">
            <a href="{{ route('client.product-detail', ['masp'=>$value->masp]) }}" class="product-img">
              {{-- <div class="card-product_img"
                style="background-image: url({{ asset('assets/uploads/products/'.$value->avatar) }});">
              </div> --}}
              <div class="card-product_img"
                style="background-image: url('{{ asset('assets/uploads/products/'.$value->avatar)}}');">
              </div>
              {{-- <div class="card-product_img">
                <img src="{{ asset('assets/uploads/products/'.$value->avatar)}}" alt="...">
              </div> --}}
            </a>
            <div class="card-body">
              <h5 class="card-title product_name">{{ $value->tensp }}</h5>
              <div class="d-flex justify-content-between align-items-center">
                <span class="card-text new-price text-danger">{{ number_format($value->giaban - (($value->giaban *  $value->giatri)/100),'0',',','.') }} VNĐ</span>
                @if ($value->giatri!==0)
                <span class="card-text old-price"> {{ number_format($value->giaban,'0',',','.') }} VNĐ</span>
                @endif
              </div>
              <div class="text-center mt-3">
                <a href="{{ route('client.product-detail', ['masp'=>$value->masp]) }}" class="btn btn-outline-warning btn-detail">Chi tiết</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
@endsection