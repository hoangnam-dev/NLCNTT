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