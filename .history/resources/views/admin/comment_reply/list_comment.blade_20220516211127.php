@extends('admin.layouts.master')
@section('title')
{{ $title }}
@endsection
{{-- {{ dd($listProducts) }} --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.comments') }}" class="btn btn-secondary">Hiển thị đánh giá</a>
                {{-- <a href="{{ route('admin.reply') }}" class="btn btn-info">Hiển thị phản hồi</a> --}}
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
                                        <th scope="col" class="sorting">Tên sản phẩm</th>
                                        <th scope="col" class="sorting">Ảnh sản phẩm</th>
                                        <th scope="col" class="sorting">Số sao</th>
                                        <th scope="col" class="sorting">Ngày đánh giá</th>
                                        <th scope="col" class="sorting">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                    $i = 1;
                                    @endphp --}}
                                    @foreach ($comments as $key => $values)
                                    @if ($values->hasReplyComment = 'null')
                                    <tr>
                                        <th scope="row">{{ $values->mabl }}</th>
                                        {{-- <th scope="row">{{ $values->mabl }}</th>
                                        <th scope="row">{{ $values->mabl }}</th> --}}
                                        <td>{{ $values->hasProduct->tensp }}</td>
                                        <td>
                                            <div class="images">
                                                <img src="{{ asset('assets/uploads/products').'/'.$values->hasProduct->avatar }}"
                                                    class="img-fluid" alt="{{ $values->hasProduct->avatar }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $values->sosao)
                                                        <i class="fas fa-star" style="color: orange"></i>
                                                    @else
                                                        <i class="fas fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>{{ date_format(date_create($values->ngaybl),'d-m-Y H:i:s') }}</td>
                                        <td>
                                            <div class="row mx-2">
                                                <a href="{{ route('admin.comments.comment-detail', ['mabl'=>$values->mabl]) }}"
                                                    class="btn btn-success">
                                                    <i class="fas fa-edit"></i>Detail</a>
                                            </div>
                                            <form class="ml-3" action="{{ route('admin.comments.destroy-comment', ['mabl'=>$values->mabl]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"  name="comment_del">
                                                <i class="fas fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            {{ $comments->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection