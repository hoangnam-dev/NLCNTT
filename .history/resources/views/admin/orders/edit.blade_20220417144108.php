@extends('admin.layouts.master')
@section('title')
{{ $title .= ' (Mã đơn hàng: '. $orderInfo->madh .')' }}
@endsection
@section('content')
<div class="wrap px-3 mb-5">
    <form action="{{ route('admin.orders.order-update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-{{ session('status') }}">
                    {{ session('sttContent') }}
                </div>
                @endif
            </div>
        </div>
        <hr class="mt-1 mb-3">
        <div class="row">
            <div class="col-md-12 mb-3  order-info d-flex justify-content-between align-items-baseline">
                <div class="mt-1 address-delivery" style="font-size: 18px;">
                    <div class="d-flex justify-content-start align-items-sm-start">
                        <h4 class="addr-delivery_title">Địa chỉ giao hàng</h4>
                        <div class="mx-3">
                            @if ($orderInfo->trangthai == 0)
                            @php
                            $type = 'danger';
                            $status = 'Chờ xác nhận';
                            $sttContent = 'Giao hàng';
                            @endphp
                            @elseif ($orderInfo->trangthai == 1)
                            @php
                            $type = 'info';
                            $status = 'Đang giao';
                            $sttContent = 'Hoàn thành';
                            @endphp
                            @else
                            @php
                            $type = 'success';
                            $status = 'Hoàn thành';
                            $sttContent = 'Hoàn thành';
                            @endphp
                            @endif
                            <div class="text-center rounded alert-{{ $type }}"
                                style="cursor: default; padding: 0 3px; font-size: 12px">
                                {{ $status }}
                            </div>
                        </div>
                    </div>
                    <div class="addr-delivery_content px-3">
                        <div class="mb-1">Họ tên khách hàng: <span class="text-bold mx-3">{{ $orderInfo->tenkh }}</span>
                        </div>
                        <div class="mb-1">Địa chỉ nhận hàng: <span class="text-bold mx-3">{{ $orderInfo->diachi_gh
                                }}</span></div>
                        <div class="mb-1">SĐT khách hàng: <span class="text-bold mx-3">{{ $orderInfo->sodienthoai
                                }}</span></div>
                        <div class="mb-1">Email khách hàng: <span class="text-bold mx-3">{{ $orderInfo->email }}</span>
                        </div>
                        <div class="mb-1">Ngày đặt hàng:
                            <span class="text-bold mx-3">{{ date_format(date_create($orderInfo->ngaydh),'d-m-Y H:i:s')
                                }}</span>
                        </div>
                        <div class="mb-3">Ngày giao hàng:
                            @if ($orderInfo->trangthai == 0)
                            <input type="date" name="delivery_date" class="form-control" required>
                            @error('delivery_date')
                            <div class="input-group">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            @else
                            <input type="hidden" name="delivery_date" value="{{ $orderInfo->ngaygh }}">
                            <span class="text-bold mx-3">{{
                                date_format(date_create($orderInfo->ngaygh),'d-m-Y')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @if (isset($status) && $status !== 'Hoàn thành')
                <input type="hidden" name="orderID" value="{{ $orderInfo->madh }}">
                <button type="submit" name="handle" class="btn btn-{{ $type }}">{{ $sttContent }}</button>
                @endif

            </div>
        </div>
        <hr class="mb-4">
        <div class="product-content">
            <h4 class="mb-3">Thông tin sản phẩm</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá đặt hàng</th>
                        <th scope="col">Số lượng mua</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1
                    @endphp
                    @foreach ($orderDetail as $item)
                    {{-- {{ dd($item) }} --}}
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>
                            <div class="images">
                                <img src="{{ asset('assets/uploads/products').'/'.$item->hasProducts->avatar }}"
                                    class="img-fluid" alt="{{ $item->hasProducts->avatar }}">
                            </div>
                        </td>
                        <td>{{ $item->hasProducts->tensp }}</td>
                        <td>{{ number_format($item->dongiaban,'0',',','.') }} VNĐ</td>
                        <td>{{ $item->soluongmua }}</td>
                        <td class="text-danger">{{ number_format($item->dongiaban*$item->soluongmua,'0',',','.') }} VNĐ
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="order-total mt-2">
                    Tổng tiền:
                    <span class="text-danger">{{ number_format($orderInfo->tongtien,'0',',','.') }} VNĐ</span>
                </h3>
                @if (isset($status) && $status !== 'Hoàn thành')
                <div class="d-flex justify-content-start">
                    <button type="submit" name="handle" class="btn btn-{{ $type }}">{{ $sttContent }}</button>
                    @if ($orderInfo->trangthai !== 2)
                    {{-- <form action="{{ route('admin.orders.order-delete', ['id'=>$orderInfo->madh]) }}">
                        @csrf
                        @method('DELETE') --}}

                        {{-- </form> --}}
                    @endif
                </div>
                @endif
            </div>

        </div>
    </form>
    @if ($orderInfo->trangthai != 2)
    <div class="row">
        <div class="col-md-12x">
            {{-- <a href="{{ route('admin.orders.order-delete') }}" name="destroy" class="btn btn-dark my-4">Hủy đơn
                hàng</a> --}}

            <button type="button" name="destroy" class="btn btn-dark my-4" data-toggle="modal"
                data-target="#exampleModal">Hủy đơn hàng</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('admin.orders.order-delete') }}" method="POST">
                        <input type="hidden" name="orderID" class="form-control" value="{{ $orderInfo->madh }}">

                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lý do hủy</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    {{-- <label for="">Lý do hủy</label> --}}
                                    <textarea name="reason" id="reason" cols="30" rows="10" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" name="destroy_order" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModal">Xác nhận hủy</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection