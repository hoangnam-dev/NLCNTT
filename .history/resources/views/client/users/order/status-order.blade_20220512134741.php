@if ($order->trangthai == 0)
          @php
              $status = 'wait';
              $sttContent = 'Chờ xác nhận'
          @endphp
      @elseif ($order->trangthai ==  1)
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
<div class="row">
    <div class="order-status col-sm-12 col-md-12 bg-black">

    </div>
</div>