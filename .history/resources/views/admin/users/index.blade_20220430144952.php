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
              @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
              @endif
              <table id="example2" class="table table-bordered table-hover dataTable dtr-inline">
                <thead>
                  <tr>
                    <th scope="col" class="sorting sorting_asc">#</th>
                    <th scope="col" class="sorting">Tên nhân viên</th>
                    <th scope="col" class="sorting">Email</th>
                    @foreach ($listRole as $role)
                    <th scope="col" class="sorting">{{ $role->tenquyen }}</th>
                    @endforeach
                    <th scope="col" class="sorting">Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($listUsers as $key => $values)
                  <tr>
                    <th scope="row">{{ $values->manv }}</th>
                    <td>{{ $values->tennv }}</td>
                    <td>{{ $values->email }}</td>
                    @foreach ($listRole as $role)
                    <input type="hidden" class="url" value="{{ route('admin.users.admin-set-role') }}">
                    <input type="hidden" class="token" value="{{ csrf_token() }}">
                    <td>
                      <div class="form-check">
                        <input class="form-check-input role_check" type="checkbox" value="{{ $role->maquyen }}" {{ $values->hasRole($role->tenquyen) ? 'checked'  : ''}} data-manv={{ $values->manv }} id="defaultCheck1">
                      </div>
                    </td>
                    @endforeach
                    <td class="border-bottom-0">
                      <div class="row">
                        {{-- Sửa --}}
                        <a href="{{ route('admin.users.admin-edit', ['manv'=>$values->manv]) }}"
                          class="btn btn-success">
                          <i class="fas fa-edit"></i>Edit</a>
                        {{-- Xóa --}}
                        <form class="ml-3" action="{{ route('admin.users.admin-delete', ['manv'=>$values->manv]) }}"
                          method="post">
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
            {{-- <div class="col-sm-12 col-md-5">
              <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57
                entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                <ul class="pagination justify-content-end">
                  <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#"
                      aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                  <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1"
                      tabindex="0" class="page-link">1</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2"
                      tabindex="0" class="page-link">2</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3"
                      tabindex="0" class="page-link">3</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4"
                      tabindex="0" class="page-link">4</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5"
                      tabindex="0" class="page-link">5</a></li>
                  <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6"
                      tabindex="0" class="page-link">6</a></li>
                  <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2"
                      data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                </ul>
              </div>
            </div> --}}
            <div class="col-sm-12 col-md-7">
              {{ $listUsers->appends(request()->all())->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.users.set-role')
  @endsection
  @section('js')
  <script>
    $( ".btn-danger" ).click(function() {
      if(confirm( 'Bạn có chắc muốn xóa nhân viên này?' )==true) {
        return true;
      }
      return false;
    });

    $('.role_check').change(function (e) { 
      e.preventDefault();
      var manv = $(this).data('manv');
      var maquyen = $(this).val();
      var url = $('.url').val();
      var _token = $('.token').val();
      // alert(manv +'---'+ maquyen +'---'+url);
      $.ajax({
        type: "post",
        url: url,
        data: {
          'manv': manv,
          'maquyen': maquyen,
          '_token': _token
        },
        // dataType: "dataType",
        success: function (response) {
          console.log(response);
          if(response.status == 'success') {
            alert(response.message);
          }
        }
      });
    });
  </script>
  @endsection