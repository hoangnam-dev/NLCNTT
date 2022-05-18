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
                <a href="{{ route('admin.products.comments') }}" class="btn btn-secondary">Hiển thị tất cả</a>
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
                                        <th scope="col" class="sorting">Ngày binh luận</th>
                                        <th scope="col" class="sorting">Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{ dd($comments); }}
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($comments as $key => $values)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        {{-- <th scope="row">{{ $values->mabl }}</th>
                                        <th scope="row">{{ $values->mabl }}</th> --}}
                                        <td>{{ $values->hasProduct->tensp }}</td>
                                        <td>
                                            <div class="images">
                                                <img src="{{ asset('assets/uploads/products').'/'.$values->hasProduct->avatar }}"
                                                    class="img-fluid" alt="{{ $values->hasProduct->avatar }}">
                                            </div>
                                        </td>
                                        <td>{{ date_format(date_create($values->ngaybl),'d-m-Y H:i:s') }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('admin.products.comment-detail', ['mabl'=>$values->mabl]) }}"
                                                    class="btn btn-warning">Detail</a>
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
                            {{ $comments->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script>
        $( ".btn-danger" ).click(function() {
      if(confirm( 'Bạn có chắc muốn xóa sản phẩm này?' )==true) {
        return true;
      }
      return false;
    });
    // $('.icon').click(function(e) {
    //   e.preventDefault();
    //   let status = $(this).data('status');
    //   // alert(status);
    //   $.ajax({
    //     url: "{{ route('admin.products.product-status') }}",
    //     type: "POST",
    //     data: {'stt':status},
    //     success: function(response) {
    //       response = JSON.parse(response);
    //         if (response.status == "1") {
    //           alert('ok');
    //         } else {
    //           alert('fail');
    //         }
    //       }
    //     }
    //   });
    // })
    </script>
    @endsection