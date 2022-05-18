<div class="row  mb-4">
    <div class="order-step col-sm-12 col-md-8 mx-auto">
        <div class="order_step active {{ $order->trangthai>0?'complete':'' }}">
            <div class="order_step-status">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Đơn đã đặt</div>
        </div>
        <div class="order_step">
            <div class="order_step-status {{ $order->trangthai>1?'active':'active complete' }}">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Chờ xác nhận</div>
        </div>
        <div class="order_step">
            <div class="order_step-status {{ $order->trangthai=2?'active':'' }}">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Đang giao hàng</div>
        </div>
        <div class="order_step">
            <div class="order_step-status">
                <i class="order_step-status_icon fa-solid fa-clipboard-list"></i>
            </div>
            <div class="order_step-title">Đã giao hàng</div>
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