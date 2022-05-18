@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')

<div class="container mb-5">
    <div class="row">
        <div id="message" class="col-md-12">

        </div>
        {{-- <div class="col-12 ctn-mb"> --}}
            <div class="prd_title mt-3 border-bottom mb-5 title-font">
                <h2 class="prd_title-name">{{ $product->tensp }}</h2>
            </div>
            <div class="d-flex justify-content-between">
                <div class="product-slide">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 0"></button>
                            @foreach ($listImages as $indicator)
                            @php
                            $i=1
                            @endphp
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide {{ $i++ }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner text-center">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/uploads/products/'.$product->avatar.'') }}" class="w-75"
                                    alt="...">
                            </div>
                            @foreach ($listImages as $image)
                            <div class="carousel-item">
                                <img src="{{ asset('assets/uploads/products/'.$image->hinhanh.'') }}" class="w-75"
                                    alt="...">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon btn-slide" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon btn-slide" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="product-info">
                    <form id="form-order" method="POST">
                        {{-- @csrf --}}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="product-price">
                            <span class=" product_price text-danger">
                                {{ number_format($product->giaban - (($product->giaban * $product
                                ->giatri)/100),'0',',','.') }} VNĐ
                            </span>
                            <input type="hidden" id="price" name="product_price"
                                value="{{ $product->giaban - (($product->giaban *  $product->giatri)/100) }}">
                            @if ($product->giatri!=0)
                            <span class="old-price">
                                {{ number_format($product->giaban,'0',',','.') }} VNĐ
                            </span>
                            @endif
                        </div>
                        <div class="prd_quantity d-flex align-items-center mt-3
                            @if ($product->soluong == 0 || $product->trangthai != 1)
                                disable
                            @endif
                            ">
                            <div class="btn-change-qty btn btn-outline-danger" id="minus">
                                <span>-</span>
                            </div>
                            <input type="text" name="product_quantity" class="qty_input btn" id="qty" value="1"
                                onblur="return changeQty();">
                            <input type="hidden" name="" value="{{ $product->soluong }}" id="product-qty">
                            <div class="btn-change-qty btn btn-outline-danger" id="plus">
                                <span>+</span>
                            </div>
                        </div>
                        <div id="error-qty" class="d-block mt-2 text-danger error-message err-qty"></div>
                        @if ($product->giatri!=0)
                        <div class="prd-sale-info mt-4">
                            <span class="prd-sale-info-title">Nhận ngay khuyến mãi</span>
                            <ul class="prd-list">
                                <li class="prd-item">
                                    <i class="prd-icon fas fa-check-circle"></i>
                                    <span class="prd-item_link">Giảm giá {{ $product->giatri }}%</span>
                                </li>
                            </ul>
                        </div>
                        @endif
                        <div class="prd_oder">
                            @if ($product->trangthai !== 1)
                            <button type="text" class="btn btn-dark mt-4 w-50 btn-prd-detail">Nhừng kinh doanh</button>
                            @elseif ($product->soluong === 0)
                            <button type="text" class="btn btn-warning mt-4 w-50 btn-prd-detail">Tạm hết hàng</button>
                            @else
                            <button type="button" id="btn-order" class="btn btn-danger mt-4 w-50 btn-prd-detail"
                                name="submit" data-prd_id="{{ $product->masp }}">Thêm vào giỏ hàng</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            {{--
        </div> --}}
    </div>
    <div class="row mt-5">
        <div class="col-md-7 col-sm-12 rounded" style="margin-top: 10px;">
            <div class="description">
                <h3 class="prd_description-title my-3 text-center title-font">Đánh giá sản phẩm {{ $product->tensp }}
                </h3>
                <div class="prd_description active">
                    {!! $product->mota !!}
                </div>
                <div class="description-overlay">
                    <div class="toggle_btn btn btn-outline-dark">Xem thêm</div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-12">
            @include('client.products.product-attributes')
        </div>
    </div>

    {{-- Comments --}}
    <div class="col-lg-12 mt-5 product-comment">
        <div class="card">
            <h5 class="card-header">Đánh giá</h5>
            @if (session('status'))
            <div class="mx-2 my-2 alert alert-{{ session('status') }}">
                {{ session('sttContent') }}
            </div>
            @endif
            <div class="card-body text-center">
                <div class="text-mute title-font" style="font-size: 28px">Đánh giá trung bình</div>
                <p class="avg_rating text-danger">{{ round($rating,2) }}/5.0</p>
                @for ($i = 1; $i <= 5; $i++) @if ($i <=round($rating)) <i class="fas fa-star start-icon start_rating">
                    </i>
                    @else
                    <i class="fas fa-star start-icon"></i>
                    @endif
                    @endfor
                    <hr class="mb-3">
            </div>
            @if ($hasComment !== 1)
            <form action="{{ route('client.product-detail.comment') }}" method="POST">
                @csrf

                <div class="card-body">
                    <input type="hidden" name="product_id" value="{{ $product->masp }}">
                    <div class="mt-3 mb-3 px-5">
                        <div class="form-group mb-2 rating">
                            <ul class="starts">
                                <li class="start" title="Tệ" data-value="1"><i class="fa fa-star"></i></li>
                                <li class="start" title="Tạm được" data-value="2"><i class="fa fa-star"></i>
                                </li>
                                <li class="start" title="Bình thường" data-value="3"><i class="fa fa-star"></i></li>
                                <li class="start" title="Tốt" data-value="4"><i class="fa fa-star"></i></li>
                                <li class="start" title="Rất tốt" data-value="5"><i class="fa fa-star"></i>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="product_rating" class="result_rating" value="">
                        <textarea class="form-control" name="product_comment" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Viết đánh giá của bạn"></textarea>
                        <button type="submit" name="main_submit" class="mt-3 btn btn-danger"
                            style="width: 90px">Gửi</button>
                    </div>
            </form>
            @else
            <div class="alert alert-info">Bạn đã đánh giá sản phẩm này</div>
            @endif
            <hr class="mt-3 mb-3">
            <div class="card-body">
                @include('client.products.comment')
            </div>
        </div>
    </div>
    @endsection

    @section('js')
    <script>
        // Quantity Product
    var qty = $("#product-qty").val();
    var minus = document.getElementById("minus");
    var plus = document.getElementById("plus");
    var input = $("#qty");
    // Kiểm tra Số Lương Mua với Số Lượng Tồn
    function changeQty() {
        console.log(qty);
        var quantity = parseInt(input.val());
        if (quantity <= qty && quantity >= 1) {
            inputQty = quantity;
            message = "";
            showErr("qty", message);
        } else {
            message = "Số lượng mua tối thiểu là 1 và không được vượt quá " + qty;
            showErr("qty", message);
            inputQty = 1;
        }
        input.val(inputQty);
    }
    // Tăng Số Lượng
    plus.addEventListener("click", function() {
        var plus = parseInt(input.val());
        var plus = qty_plus(plus);
        if (plus <= qty) {
            input.val(plus);
            message = " ";
        } else {
            message = "Số lượng không được vượt quá " + qty;
        }
        showErr("qty", message);
    });
    // Giảm Số Lượng
    minus.addEventListener("click", function() {
        var minus = parseInt(input.val());
        var minus = qty_minus(minus);
        if (minus <= qty) {
            input.val(minus);
            message = " ";
        } else {
            message = "Số lượng không được vượt quá " + qty;
        }
        showErr("qty", message);
    });

    // add to cart
    $('#btn-order').click(function() {
        var login = $('.check-login').val();
        if(login == 0) {
            setTimeout(function() 
            {
                location.href = "{{ route('client.user.login') }}";
            }, 900);
            $('#message').html('<div class="alert alert-danger">Bạn phải đăng nhập để mua hàng</div>');
        }
        var product_id = $(this).data('prd_id');
        var product_quantity = $('#qty').val();
        var product_price = $('#price').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: "{{ route('client.cart.addToCart') }}",
            data: {"product_id":product_id,
                    "product_quantity":product_quantity,
                    "product_price":product_price,
                    "_token": _token
                },
            success: function (response) {
                if(response.status == 'success') {
                    setTimeout(function() 
                        {
                            location.reload();  //Refresh page
                        }, 800);
                    $('#message').html(
                        '<div class="alert alert-success">Thêm giỏ hàng thành công</div>');
                        
                }
            }
        });
    });

    // show more description
    $('.toggle_btn').click(function() {
        $('.prd_description').toggleClass('des_active');
        $(this).toggleClass('toggle_active');
        if($(this).hasClass('toggle_active')) {
            $(this).text('Thu gọn');
        } else {
            $(this).text('Xem thêm');
        }
    });

    // rating
    $('.starts li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
        // $('.start').addClass('active_start');
    
        $(this).parent().children('li.start').each(function(e){
        if (e < onStar) {
            $(this).addClass('active_start');
        }
        else {
            $(this).removeClass('active_start');
        }
        });
        
    }).on('mouseout', function(){
        $(this).parent().children('li.start').each(function(e){
        $(this).removeClass('active_start');
        });
    });

    $('.starts li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.start');
        
        for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected_start');
        }
        
        for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected_start');
        }
        $('.result_rating').val(onStar);
        
    });

    $('.btn-reply').click(function() {
        var cmt_id = $(this).data('cmt_id');
        alert(cmt_id);
    });
    </script>
    @endsection