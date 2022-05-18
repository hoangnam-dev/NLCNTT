{{-- {{ dd($carts) }} --}}
<div class="mt-5 border border-light shadow-sm p-3 mb-5 bg-white rounded">
    @if (!empty($carts))
    <table class="table cartData" data-url="{{ route('client.cart.updateCart') }}">
        <thead>
            <tr class="cart_menu">
                <td class="image">Ảnh sản phẩm</td>
                <td class="name">Tên sản phẩm</td>
                <td class="price">Giá</td>
                <td class="quantity">Số lượng</td>
                <td class="total">Thành tiền</td>
                <form action="{{ route('client.cart.delCart') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <td><button class="btn btn-dark">Xóa tất cả</button></td>
                </form>
            </tr>
        </thead>
        <tbody class="cart-body">
            @php
                $total = 0;
            @endphp
            @foreach($carts as $id => $item )
                @php
                    $total += $item['subtotal'];
                @endphp
            <tr class="cart_item">
                <input type="hidden" class="itemID" name="id" value="{{ $id }}" data-token="{{ csrf_token() }}">
                <td>
                    <a href="{{ route('client.product-detail', ['masp'=>$id]) }}"><img src="{{ asset('assets/uploads/products/'.$item['product_avatar']) }}" alt=""class="cart_item-img"></a>
                </td>
                <td class="cart_description">
                    <h4><a class="text-decoration-none" style="color: #212529;" href="{{ route('client.product-detail', ['masp'=>$id]) }}">{{ $item['product_name'] }} - {{ $id }}</a></h4>
                </td>
                <td class="cart_price">
                    <span class="text-black">{{ number_format($item['product_price'],'0',',','.') }} VNĐ</span>
                </td>
                <td class="cart_quantity">
                    <div class="prd_quantity">
                        <div class="btn-change-qty btn btn-outline-danger" id="minus_{{ $id }}" onclick=" minusQty({{ $id }})">
                            <span>-</span>
                        </div>
                        <input type="text" id="qty{{ $id }}" name="prd_quantity" class="qty_input btn" style="width: 50px" value="{{ $item['product_qty'] }}" readonly >
                        <input type="hidden" name="" value="30" id="product-qty">
                        <div class="btn-change-qty btn btn-outline-danger" id="plus_{{ $id }}" onclick=" plusQty({{ $id }})">
                            <span>+</span>
                        </div>
                    </div>
                </td>
                <td class="cart_subtotal">
                    <span class="cart_subtotal_price text-danger">{{ number_format($item['subtotal'],'0',',','.') }} VNĐ</span>
                </td>
                <input type="hidden" class="prd_id" name="prd_id" value="{{ $item['product_id'] }}">
                <td class="cart_delete">
                    {{-- <a class="cart-item_delete text-black-50 del-item" data-id="{{ $item['product_id'] }}" data-url="{{ route('client.cart.delItem') }}">
                        <i class="fa-solid fa-trash-can"></i>
                    </a> --}}
                    {{-- <form action="{{ route('client.cart.delItem',['id'=>$item['product_id']]) }}" method="GET">
                        @csrf
                        @method('GET') --}}

                        <a class="cart-item_delete text-black-50" data-url="{{ route('client.cart.delItem') }}" data-id="{{ $id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-md-12 mt-3 cart-bottom d-flex justify-content-md-between align-items-center">
        <div class="cart-order btn btn-danger mx-4">Đặt hàng</div>
        <div class="cart-total">Tổng cộng: <span class="me-5 mx-4 text-danger">{{ number_format($total,'0',',','.') }} VNĐ</span></div>
    </div>
    @else
    <p class="text-center">Không có sản phẩm nào trong giỏ hàng</p>
    @endif
</div>