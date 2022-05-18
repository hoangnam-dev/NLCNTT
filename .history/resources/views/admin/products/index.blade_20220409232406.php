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
            <a href="{{ route('admin.products') }}" class="btn btn-secondary">Hiển thị tất cả</a>
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
                        <th scope="col" class="sorting">Số lượng</th>
                        <th scope="col" class="sorting">Nổi bật</th>
                        <th scope="col" class="sorting">Bày bán</th>
                        <th scope="col" class="sorting">Danh mục</th>
                        <th scope="col" class="sorting">Tùy chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($listProducts as $key => $values)
                        <tr>
                          <th scope="row">{{ ++$key }}</th>
                          <td>{{ $values->tensp }}</td>
                          <td>
                            <div class="images">
                              <img src="{{ asset('assets/uploads/products').'/'.$values->avatar }}" class="img-fluid"
                                alt="{{ $values->avatar }}">
                            </div>
                          </td>
                          <td>{{ $values->soluong }}</td>
                          <td>
                              <div class="icon">
                                <i class="fas {{ $values->noibat==1?'fa-check-circle icon-green':'fa-times-circle icon-red' }}"></i>
                              </div>
                          <td>
                              <div class="icon">
                                <i class="fas {{ $values->trangthai==1?'fa-check-circle icon-green':'fa-times-circle icon-red' }}"></i>
                              </div>
                          </td>
                          <td>{{ $values->hasCategory->tendm }}</td>
                          <td>
                            <div class="row">
                              {{-- Sửa --}}
                              <a href="{{ route('admin.products.product-edit', ['masp'=>$values->masp]) }}"
                                class="btn btn-success"><i class="fas fa-edit"></i>Edit</a>
                              {{-- Xóa --}}
                              <form class="ml-3" action="{{ route('admin.products.product-delete', ['masp'=>$values->masp]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                  <i class="fas fa-trash"></i>Delete</button>
                              </form>
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
                  {{ $listProducts->appends(request()->all())->links()   }}
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