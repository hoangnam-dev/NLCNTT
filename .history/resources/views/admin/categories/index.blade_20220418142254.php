@extends('admin.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
                    <th scope="col" class="sorting">Tên danh mục</th>
                    <th scope="col" class="sorting">Tổng sản phẩm</th>
                    <th scope="col" class="sorting">Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listCategories as $key => $values)
                    <tr>
                      <th scope="row">{{ ++$key }}</th>
                      <td>{{ $values->tendm }}</td>
                      <td>{{ $values->hasProducts->count() }}</td>
                      <td>
                        <div class="row">
                          {{-- Sửa --}}
                          <a href="{{ route('admin.categories.category-edit', ['madm'=>$values->madm]) }}"
                            class="btn btn-success">
                            <i class="fas fa-edit"></i>
                            Edit
                          </a>
                          {{-- Xóa --}}
                          <form class="ml-3" action="{{ route('admin.categories.category-delete', ['madm'=>$values->madm]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                              <i class="fas fa-trash"></i>
                              Ẩn/Hiển thị
                            </button>
                          </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
          {{-- Pagination --}}
          <div class="col-sm-12 col-md-7">
            {{ $listCategories->appends(request()->all())->links()   }}
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
@section('js')
  <script>
    $( ".btn-danger" ).click(function() {
      if(confirm( 'Bạn có chắc muốn xóa danh mục này?' )==true) {
        return true;
      }
      return false;
    });
  </script>
@endsection