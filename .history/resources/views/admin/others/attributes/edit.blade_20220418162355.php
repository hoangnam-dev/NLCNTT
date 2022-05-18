@extends('admin.layouts.master')
@section('title')
    {{ $title }}    
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="ml-3">
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <form action="{{ route('admin.attributes.attribute-edit', ['matt'=>$attribute->matt]) }}" class="col-6" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label for="name" class="form-label">Tên tên thuộc tính</label>
          <input type="text" name="tentt" class="form-control" placeholder="Nhập tên tên thuộc tính..."
            value="{{ $attribute->tentt }}">
          @error('tentt')
          <div class="input-group">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Các giá trị</label>
          <table id="example2" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
              <tr>
                <th scope="col" class="sorting sorting_asc">#</th>
                <th scope="col" class="sorting">Giá trị</th>
                <th scope="col" class="sorting">Tùy chọn</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($attribute->hasAttributeDetail as $key => $value)
              <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $value->giatri }}</td>
                <td>
                    <a href="{{ route('admin.products.image-delete', ['macttt'=>$value->macttt]) }}"
                      class="btn btn-danger">Xóa</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <button type="button" class="btn btn-info add_attr mb-3" data-toggle="modal" data-target="#exampleModal" data-attr_id="{{ $attribute->matt }}" data-whatever="@getbootstrap">Thêm giá trị</button>
          @include('admin.blocks.add-Attribute')
        </div>
        <!-- /.col -->
        <div class="row">
          <div class="col-3">
            <button type="submit" name="create_attribute" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script>
      
  $('.add_attr').on('click', function() { 
    var attr_id = $(this).data('attr_id');
    $('#add_attr').data('id', attr_id);
  });

  $('#add_attr').on('click', function(event) { 
    event.preventDefault();
    var attrID = $(this).data('id');
    var url = $('#attr_form').data('url');
    var _token = $(this).data('token');
    var attrValue = $('#attr_value').val();
    $('#exampleModal').modal('hide');
    $.ajax({
      type: "POST",
      url: url,
      data: {
        'matt': attrID,
        'giatri': attrValue,
        '_token': _token
      },
      success: function (response) {
        if (response.status == 'success') {
          $('#exampleModal').modal('hide')
          location.reload();
        }
        else if(response.status == 'error') {
          alert('Thêm thuộc tính không thành công')
        }
      }
    });
  });
  </script>
@endsection