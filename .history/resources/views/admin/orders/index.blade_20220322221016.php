@extends('admin.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Hiển thị tất cả</a>
            </div>
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sorting sorting_asc">#</th>
                                        <th scope="col" class="sorting">Mã đơn hàng</th>
                                        <th scope="col" class="sorting">Tên khách hàng</th>
                                        <th scope="col" class="sorting">Ngày đặt hàng</th>
                                        <th scope="col" class="sorting">Giá trị</th>
                                        <th scope="col" class="sorting">Trạng thái</th>
                                        <th scope="col" class="sorting">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $values)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $values->madh }}</td>
                                        <td>{{ $values->tenkh }}</td>
                                        <td>{{ date_format(date_create($values->ngaydh),'d-m-Y H:i:s') }}</td>
                                        <td>{{ number_format($values->tongtien,'0',',','.') }} VNĐ</td>
                                        <td>
                                            @if ($values->trangthai == 0)
                                                @php
                                                    $status = 'dark';
                                                    $sttContent = 'Chờ xác nhận'
                                                @endphp
                                            @elseif ($values->trangthai == 1)
                                                @php
                                                    $status = 'info';
                                                    $sttContent = 'Đang giao'
                                                @endphp
                                            @else
                                                @php
                                                    $status = 'success';
                                                    $sttContent = 'Hoàn thành'
                                                @endphp
                                            @endif
                                            <div class="alert-{{ $status }}">
                                                {{ $sttContent }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                {{-- Sửa --}}
                                                <a href="{{ route('admin.orders.detail', ['madh'=>$values->madh]) }}"
                                                    class="btn btn-info">Chi tiết</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            {{ $orders->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection