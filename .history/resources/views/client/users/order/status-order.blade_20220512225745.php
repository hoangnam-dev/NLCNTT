@php
    $status = 'Hoàn thành';
@endphp
@if ($order->trangthai==0)
    @php
        $status = 'Chờ xử lý';
    @endphp
@elseif ($order->trangthai==1)
    @php
        $status = 'Đang giao hàng';
    @endphp
@endif
<div class="row  mb-4">
    <div class="col-md-12">
        <div class="order-title">Mã đơn hàng: <strong>{{ $order->madh }}</strong> | <span class="text-danger">{{ $status }}</span></div>
    </div>
    <div class="order-step col-sm-12 col-md-8 mx-auto">
        <div class="order_step active complete">
            <div class="order_step-status">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Đơn đã đặt</div>
        </div>
        <div class="order_step {{ $order->trangthai==0?'acitve':'' }} {{ $order->trangthai>0?'active complete':'' }}">
            <div class="order_step-status">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Chờ xử lý</div>
        </div>
        <div class="order_step {{ $order->trangthai==1?'active':'' }} {{ $order->trangthai>1?'active complete':'' }}">
            <div class="order_step-status">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Đang giao hàng</div>
        </div>
        <div class="order_step {{ $order->trangthai==2?'active':'' }}">
            <div class="order_step-status">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Hoàn thành</div>
        </div>
        {{-- <div class="order_step-line"></div> --}}
    </div>
</div>
{{-- <div class="row mb-4">
    <div class="col-sm-12 col-md-8 mx-auto">
        <ul class="progressbar">
            <li class="complete">Step 1</li>
            <li class="complete">Step 2</li>
            <li class="active">Step 3</li>
            <li>Step 4</li>
            <li>Step 5</li>
          </ul>
    </div>
</div> --}}