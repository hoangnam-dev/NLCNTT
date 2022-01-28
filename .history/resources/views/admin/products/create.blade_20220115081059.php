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
        <form action="{{ route('admin.products.product-create') }}" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên sản phẩm...">
          </div>
          @error('name')
          <div class="input-group mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Số lượng</label>
            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}" placeholder="Số lượng...">
          </div>
          @error('quantity')
          <div class="input-group mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="" class="form-label">Giá bán (VNĐ)</label>
            <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="Giá bán...">
          </div>
          @error('price')
          <div class="input-group mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
          <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh đại diện</label>
            <input class="form-control" type="file" name="avatar">
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Ảnh khác</label>
            <input class="form-control" type="file" multiple name="other_img[]">
          </div>
          <div class="form-floating mb-3">
            <label for="floatingTextarea2">Mô tả</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
          </div>
          <div class="form-floating mb-3">
            <label class="form-label" for="flexSwitchCheckDefault">Trưng bày sản phẩm</label>
            <div class="form-check form-switch">
              <input class="form-check-input" name="status" value="1" type="checkbox" role="switch" checked>
              <label class="form-check-label-label" for="flexSwitchCheckDefault">Có</label>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input" name="status" value="0" type="checkbox" role="switch">
              <label class="form-check-label-label" checked for="flexSwitchCheckDefault">Không</label>
            </div>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Xuất xứ</label>
            <input type="text" name="origin" class="form-control" value="{{ old('origin') }}" placeholder="Xuất xứ...">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Danh mục</label>
            <select class="form-control form-select d-block" name="category_id">
              @foreach ($categories as $key => $category )
              <option value="{{ $category->MaDM }}">{{ $category->TenDM }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Khuyến mãi</label>
            <select class="form-control form-select d-block" name="promo_id">
              @foreach ($promotions  as $key => $promo )
              <option value="{{ $promo->MaKM }}">{{ $promo->TenKM }}</option>
              @endforeach
            </select>
          </div>
          <!-- /.col -->
          <div class="col-2 mb-3">
            <button type="submit" name="prd_add_submit" class="btn btn-primary btn-block">Thêm mới</button>
          </div>
          <!-- /.col -->
          @csrf
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script type="text/javascript">
  CKEDITOR.replace('description');
  // var d = document.getElementById('description').value;
  // alert(d);
  $('.form-check-input').on('click', function() { 
    $('.form-check-input').prop('checked', false);
    this.checked = true; 
  });
</script>
@endsection