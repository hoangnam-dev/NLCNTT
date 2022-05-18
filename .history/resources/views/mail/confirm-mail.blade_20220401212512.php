<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    <style>
        *{
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }
        .container{
            max-width: 1320px;
            padding-right: 7.5px;
            padding-left: 7.5px;
            margin-right: auto;
            margin-left: auto;
        }
        .row {
            margin: 15px 0;
        }
        .header{
            color: brown;
        }
        .header-content {
            margin-top: 10px;
        }
        .content-title{
            margin-bottom: 10px;
        }
        .table th, td {
            text-align: center;
        }
        .order-info {
            line-height: 24px;
        }
        .mb-2 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }
        th:th:nth-child(1), th:th:nth-child(2) {
            width: 40%;
        }
        th:th:nth-child(3) {
            width: 20%;
        }
        thead tr {
            border: 1px solid black;
        }
        tbody tr:last-child{
            border-top: 1px solid black;
        }
        th, td {
            padding: 5px 0;
            line-height: 32px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="header">
                <h2 class="text-danger mt-2">ABCShop xin chào Nam!</h2>
            </div>
            <div class="header-content">Đơn hàng mã <strong>921</strong> của bạn đã được xác nhận và sẽ giao tới bạn vào ngày <strong>22-4-2022</strong>.
            </div>
        </div>
        <hr class="mb-2">
        <div class="row">
            <h3 class="content-title">Thông tin đơn hàng</h3>
            <div class="order-info mb-2">
              <div>Người nhận: <strong>Hoàng Nam</strong></div>
              <div>Địa chỉ nhận hàng: <strong>Mậu Thân, Ninh Kiều, Cần Thơ</strong></div>
              <div>Số điện thoại: <strong>0987654321</strong></div>
            </div>
            <hr class="mb-2">
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
                  <td><strong>Tổng cộng: </strong></td>
                  <td></td>
                  <td></td>
                  <td><strong>40.000.000 VNĐ</strong></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>