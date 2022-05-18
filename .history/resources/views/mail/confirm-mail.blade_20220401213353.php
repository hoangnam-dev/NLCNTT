<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    {{--
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }

        .container {
            max-width: 1320px;
            padding-right: 7.5px;
            padding-left: 7.5px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            margin: 15px 0;
        }

        .header {
            color: brown;
        }

        .header-content {
            margin-top: 10px;
        }

        .content-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .table th,
        td {
            text-align: center;
        }

        .order-info {
            line-height: 24px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }

        .table-fill {
            background: white;
            border-radius: 3px;
            border-collapse: collapse;
            height: 320px;
            margin: auto;
            padding: 5px;
            width: 100%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            animation: float 5s infinite;
        }

        th {
            color: #D5DDE5;
            ;
            background: #1b1e24;
            border-bottom: 4px solid #9ea7af;
            border-right: 1px solid #343a45;
            font-size: 23px;
            font-weight: 100;
            padding: 24px;
            text-align: left;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            vertical-align: middle;
        }

        th:first-child {
            border-top-left-radius: 3px;
        }

        th:last-child {
            border-top-right-radius: 3px;
            border-right: none;
        }

        tr {
            border-top: 1px solid #C1C3D1;
            border-bottom-: 1px solid #C1C3D1;
            color: #666B85;
            font-size: 16px;
            font-weight: normal;
            text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
        }

        tr:first-child {
            border-top: none;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:nth-child(odd) td {
            background: #EBEBEB;
        }

        tr:last-child td:first-child {
            border-bottom-left-radius: 3px;
        }

        tr:last-child td:last-child {
            border-bottom-right-radius: 3px;
        }

        td {
            background: #FFFFFF;
            padding: 20px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 18px;
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #C1C3D1;
        }

        td:last-child {
            border-right: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="header">
                <h2 class="text-danger mt-2">ABCShop xin chào Nam!</h2>
            </div>
            <div class="header-content">Đơn hàng mã <strong>921</strong> của bạn đã được xác nhận và sẽ giao tới bạn vào
                ngày <strong>22-4-2022</strong>.
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
            {{--
            <hr class="mb-2"> --}}
            <table class="table-fill">
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