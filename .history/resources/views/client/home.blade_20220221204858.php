@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
{{-- {{ dd($sale_prds) }} --}}
@section('content')
<div class="row mb-5">
    <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="cnt_title">
                            <h2>Khuyến mãi<i class="fas fa-fire-alt title_icon"></i></h2>
                        </div>
                </div>
            </div>
            {{-- <div class="row row-cols-1 row-cols-md-3 g-4"> --}}
            <div class="row">
                @foreach ($sale_prds as $value)
                <div class="col-3">
                    <div class="product-item">
                        <!-- ẢNh Sản Phẩm -->
                        <a href="{{ route('product-detail', ['id'=>$sale_prds->masp]) }}" class="product-img">
                            <div class="product-item_img"
                                style="background-image: url('{{ asset('assets/uploads/products/'.$value->avatar.'') }}');">
                            </div>
                            {{-- <img src="{{ asset('assets/uploads/products').'/'.$value->avatar }}" class="card-img-top product-item_img"
                            alt="..."> --}}
                        </a>
                        <h3 class="product-item_name">{{ $value->tensp }}</h3>
                        <div class="product-item_price">
                            <!-- Có KM -->
                            <span class="product-item_price-old">1.000.000 VNĐ</span>
                            <span class="product-item_price-new">{{ number_format($value->giaban,'0',',','.') }}VNĐ</span>
                        </div>
                        <!-- Có KM -->
                        <div class="product-item_sale-off">
                            <span class="product-item_sale-off-label">GIẢM</span>
                            <span class="product-item_sale-off-precent">10%</span>
                        </div>
                        <div class="product-item_oder">
                            <a href="#" class="button button_general btn product-item_oder-btn">Chi tiết sản phẩm</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

    @endsection