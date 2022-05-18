<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/font/css/all.min.css') }}"> --}}
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
            font-size: 18px;
            margin-top: 10px;
        }
        .text-span {
            font-size: 20px;
            font-weight: bold;
            color: rgb(185, 42, 42);
            margin-bottom: 10px;
        }

        .content-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

       
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="header">
                <h2 class="text-danger mt-2">ABCShop xin chào <strong>{{ $orderInfo->hasUser->tenkh }}</strong>,</h2>
            </div>
            <div class="header-content">
                <p>Đơn hàng (MĐH - <span class="text-span">{{ $orderInfo->madh }}</span>) của bạn đã bị hủy. Lý do {{ $reason_destroy }}</p>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script> --}}
</body>

</html>