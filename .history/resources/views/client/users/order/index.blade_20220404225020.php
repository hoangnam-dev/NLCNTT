@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('client.blocks.subSidebar')
        </div>
        <div class="col-md-9">
            <div class="content mt-2">
                <div id="order-option"
                    class=" border border-light shadow-sm p-3 mb-3 rounded d-flex align-items-center justify-content-between" data-token="{{ @csrf_token() }}">
                    <a href="{{ route('client.user.order') }}" class="order-menu_link order-active">Tất cả</a>
                    <div href="{{ route('client.user.order-status') }}" class="order-menu_link" data-status="0">Chờ xác
                        nhận</div>
                    <div href="{{ route('client.user.order-status') }}" class="order-menu_link" data-status="1">Đang vận
                        chuyển</div>
                    <div href="{{ route('client.user.order-status') }}" class="order-menu_link" data-status="2">Đã giao</div>
                    <div href="" class="order-menu_link">Đã hủy</div>
                </div>
                <div class="content" id="orderCnt">
                    {{-- @include('client.users.order.order-component') --}}
                    @foreach ($orders as $order)
                    <div class="card border-light mb-3 border border-light shadow-sm p-3 rounded">
                        <div class="card-body">
                            <div class="item-content">
                                <a href="{{ route('client.user.order-detail', ['id'=>$order->madh]) }}"
                                    class="item-link d-flex justify-content-between align-items-center text-decoration-none">
                                    <div>Đơn hàng {{ $order->madh }}</div>
                                    <div class="item-qty"> Ngày {{ date_format(date_create($order->ngaydh),'d-m-Y H:i:s') }}</div>
                                    <div class="item-total">
                                        <span>Tổng tiền:</span>
                                        <span class="new-price font-weight-bold mx-3">{{ number_format($order->tongtien, '0','.','.') }}
                                            VNĐ</span>
                                    </div>
                                    <div>
                                        @if ($order->trangthai == 0)
                                        @php
                                        $status = 'wait';
                                        $sttContent = 'Chờ xác nhận'
                                        @endphp
                                        @elseif ($order->trangthai == 1)
                                        @php
                                        $status = 'delivery';
                                        $sttContent = 'Đang giao'
                                        @endphp
                                        @else
                                        @php
                                        $status = 'success';
                                        $sttContent = 'Hoàn thành'
                                        @endphp
                                        @endif
                                        <div class="item-status item-status_{{ $status }}">
                                            {{ $sttContent }}
                                        </div>
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
</div>

@endsection

@section('js')
<script>
    $(document).ready(function(){
            $('.order-menu_link').click(function(){
                $('.order-menu_link').removeClass('order-active');
                $(this).addClass('order-active');
                let url = $(this).attr('href');
                let status = $(this).data('status');
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {"status":status},
                    success: function (response) {
                        $('#orderCnt').html(response.orderComponent);
                    },
                    error: function (response) {
                        console.log('Error:');
                    }
                });
            });
        });
</script>
@endsection