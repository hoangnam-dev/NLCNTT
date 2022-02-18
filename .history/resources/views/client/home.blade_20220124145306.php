@extends('client.layouts.master')
@section('title')
    {{ $title }}
@endsection
{{-- {{ dd($sale_prds) }} --}}
@section('content')
<div class="row">
    <div class="col-12">
        @include('client.blocks.slide')
    </div>
</div>
<div class="row mb-5">
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    {{-- <div class="col-4">
        <div class="sidebar" style="width: 150px; text-align: center;">
            @section('sidebar')
                @include('client.blocks.sidebar')
            @show
        </div>
    </div> --}}
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2>Sản phẩm nổi bật</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($hot_prds as $value)
            <div class="col">
              <div class="card h-100">
                <img src="{{ asset('assets/uploads/products').'/'.$value->avatar }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $value->tensp }}</h5>
                  <h6 class="text-danger">{{ number_format($value->gaiban,'0',',','.') }} VNĐ</h6>
                  <p class="card-text">Điện thoại abcs hot</p>
                </div>
                <div class="card-footer">
                  <small class="btn btn-info col-12">Chi tiết</small>
                </div>
              </div>
            </div>
            @endforeach
          </div>
    </div>
</div>
<div class="row mb-5">
    {{-- <div class="col-4">
        <div class="sidebar" style="width: 150px; text-align: center;">
            @section('sidebar')
                @include('client.blocks.sidebar')
            @show
        </div>
    </div> --}}
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h2>Sản phẩm khuyến mãi</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          @foreach ($sale_prds as $value)
          <div class="col">
            <div class="card h-100">
              <img src="{{ asset('assets/uploads/products').'/'.$value->avatar }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $value->tensp }}</h5>
                <h6 class="text-danger">{{ number_format($value->giaban,'0',',','.') }} VNĐ</h6>
                <p class="card-text">Điện thoại abcs hot</p>
              </div>
              <div class="card-footer">
                <small class="btn btn-info col-12">Chi tiết</small>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</div>

@endsection