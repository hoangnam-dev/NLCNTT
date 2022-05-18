<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
</head>
<body>
    <div class="container">
        <h4 class="text-danger mt-2">ABCShop xin chào Nam!</h4>
        <p>Đơn hàng mã <strong>921</strong> của bạn đã được xác nhận và sẽ giao tới bạn vào ngày <strong>22-4-2022</strong>.
        </p>
        <h5 class="mt-3">Thông tin đơn hàng</h5>
        <hr class="mb-2">
        <div class="order-info">
          <p>Người nhận: <strong>Hoàng Nam</strong></p>
          <p>Địa chỉ nhận hàng: <strong>Mậu Thân, Ninh Kiều, Cần Thơ</strong></p>
          <p>Số điện thoại: <strong>0987654321</strong></p>
          <p>Email: <strong>hoangnam1114ad@gmail.com</strong></p>
        </div>
        <hr class="mb-3">
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Đơn giá</th>
              <th>Số lượng mua</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Iphone 11</td>
              <td>17.000.000 VNĐ</td>
              <td>1</td>
              <td>17.000.000 VNĐ</td>
            </tr>
            <tr>
              <td>Samsung Note 20 Ultra</td>
              <td>23.000.000 VNĐ</td>
              <td>1</td>
              <td>23.000.000 VNĐ</td>
            </tr>
            <tr>
              <td colspan="3"><strong>Tổng cộng:</strong></td>
              <td><strong>40.000.000 VNĐ</strong></td>
            </tr>
          </tbody>
        </table>
    
      </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>