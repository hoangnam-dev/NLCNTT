@extends('client.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="row main_content prd_content">
    <div class="col-12 ctn-mb">
        <div class="prd_title">
            <h2 class="prd_title-name">Iphone 11</h2>
        </div>
        <div class="prd_info">
            <div class="prd_info-left">
                <div class="prd_info-img">
                    <!-- Slideshow container -->
                    <div class="slideshow-container">
                        <!-- Hiển thị Avatar -->
                        <div class="mySlides fade">
                            <img class="prd_img" src="../img_upload/{{ asset('assets/uploads/products/iphone-12-256GB.jpg') }}">
                        </div>
                        <!-- Ảnh khác của Sản Phẩm -->
                           <!-- Full-width images -->
                            <div class="mySlides fade">
                                <img class="prd_img" src="../img_upload/{{ asset('assets/uploads/products/iphone-12-256GB.jpg') }}">
                                <img class="prd_img" src="../img_upload/{{ asset('assets/uploads/products/iphone-12-256GB.jpg') }}">
                                <img class="prd_img" src="../img_upload/{{ asset('assets/uploads/products/iphone-12-256GB.jpg') }}">
                            </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <!-- The dots/circles -->
                    <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                </div>
                <div class="prd_info-description">
                    <h2 class="prd_info-title">Mô tả sản phẩm</h2>
                    <p class="prd_info-description_content">Dien thoai Iphone 11</p>
                </div>
            </div>
            <div class="prd_info-right">
                <form id="form-order" method="POST">
                    <div class="prd-price">
                        <span class="prd_price-new">{{ number_format($product->giaban,'0',',','.') }}VNĐ</span>
                        <span class="prd_price-old">1.000.000 VNĐ</span>
                    </div>
                    <div class="prd_quantity 
                        @if ($product->SoLuongHang == 0 || $product->TrangThaiSP != 1)
                            disable
                        @endif
                    ">
                        <div class="qty-btn_minus" id="minus">
                            <span>-</span>
                        </div>
                        <input type="text" name="prd_quantity" class="qty_input" id="qty" value="1" onblur="return changeQty();">
                        <div class="qty-btn_plus" id="plus">
                            <span>+</span>
                        </div>
                        <div id="error-qty" class="error-message err-qty"></div>
                    </div>
                        <div class="prd-sale-info">
                            <span class="prd-sale-info-title">Nhận ngay khuyến mãi</span>
                            <ul class="prd-list">
                                <li class="prd-item">
                                    <i class="prd-icon fas fa-check-circle"></i>
                                    <span class="prd-item_link">10%</span>
                                </li>
                            </ul>
                        </div>
                    <div class="prd_oder">
                        {{-- <input type="text" id="btn-order" class="button prd-btn  button-warning" value="Ngừng kinh doanh">
                        <input type="submit" id="btn-order" class="button button_general btn prd-btn" onclick="return checkLogin();" name="submit" value="Thêm vào giỏ hàng">
                        <input type="text" id="btn-order" class="button prd-btn button-warning" value="Tạm hết hàng"> --}}
                        <input type="submit" id="btn-order" class="button button_general btn prd-btn" onclick="return checkLogin();" name="submit" value="Thêm vào giỏ hàng">
                    </div>
                </form>
                <div class="prd-specification">
                    <h2 class="prd_info-title">Thông số kỹ thuật</h2>
                    <div class="prd-specification_body">
                        <table class="prd-specification_body-tb">
                            <tbody>
                                <!-- Nếu sản phẩm là Điện thoại -->
                                <tr>
                                    <td class="prd-tb_td">Màn hình</td>
                                    <td class="prd-tb_td">6.5'</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Camera sau</td>
                                    <td class="prd-tb_td">10"</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Camera Selfie</td>
                                    <td class="prd-tb_td">13"</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">RAM </td>
                                    <td class="prd-tb_td">6 GB</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Bộ nhớ trong</td>
                                    <td class="prd-tb_td">64GB</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">CPU</td>
                                    <td class="prd-tb_td">CPU Iphone</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">GPU</td>
                                    <td class="prd-tb_td">GPU Iphone</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Dung lượng Pin</td>
                                    <td class="prd-tb_td">3300 mAh</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Thẻ SIM</td>
                                    <td class="prd-tb_td">2 Nano sim</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Hệ điều hành</td>
                                    <td class="prd-tb_td">iOS</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Thời gian ra mắt</td>
                                    <td class="prd-tb_td">2019</td>
                                </tr>
                                <tr>
                                    <td class="prd-tb_td">Xuất xứ</td>
                                    <td class="prd-tb_td">China</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" slide-active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " slide-active";
    }


    // Quantity Product
    var qty = 50;
    var minus = document.getElementById("minus");
    var plus = document.getElementById("plus");
    var input = $("#qty");
    // Kiểm tra Số Lương Mua với Số Lượng Tồn
    function changeQty() {
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
</script>
@endsection