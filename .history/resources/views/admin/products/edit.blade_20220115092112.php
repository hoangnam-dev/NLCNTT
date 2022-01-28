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
      <form action="{{ route('admin.products.product-edit', ['MaSP'=>$product->MaSP]) }}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Tên sản phẩm</label>
          <input type="text" class="form-control" name="name" value="{{ $product->TenSP }}">
        </div>
        @error('name')
        <div class="input-group mb-3">
          <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="mb-3">
          <label for="" class="form-label">Số lượng</label>
          <input type="text" name="quantity" class="form-control" value="{{ $product->SoLuong }}">
        </div>
        @error('quantity')
        <div class="input-group mb-3">
          <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="mb-3">
          <label for="" class="form-label">Giá bán (VNĐ)</label>
          <input type="text" name="price" class="form-control" value="{{ number_format($product->GiaBan, 0, ',', '.') }}">
        </div>
        @error('price')
        <div class="input-group mb-3">
          <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror
        <div class="mb-3">
          <label for="formFile" class="form-label">Ảnh đại diện</label>
          <div class="images">
            <img src="{{ asset('assets/uploads/products').'/'.$product->Avatar }}" class="img-fluid" alt="{{ $product->Avatar }}">
            <input type="hidden" name="avatar" value="{{ $product->Avatar }}">
          </div>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Thay đổi ảnh đại diện</label>
          <input class="form-control" type="file" name="new_avatar">
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Ảnh khác</label>
          {{-- <div class="images">
            <img src="{{ asset('assets/uploads/products').'/'.$product->Avatar }}" class="img-fluid" alt="{{ $product->Avatar }}">
            <input type="hidden" name="avatar" value="{{ $product->Avatar }}">
          </div> --}}
          <table id="example2" class="table table-bordered table-hover dataTable dtr-inline">
            <thead>
              <tr>
                <th scope="col" class="sorting sorting_asc">#</th>
                <th scope="col" class="sorting">Tên danh mục</th>
                <th scope="col" class="sorting">Tùy chọn</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($listImages as $key => $image)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>
                    <img style="width: 150px;" src="{{ asset('assets/uploads/products').'/'.$image->HinhAnh }}" class="img-fluid" alt="{{ $image->HinhAnh }}">
                  </td>
                  <td>
                    {{-- <div class="row"> --}}
                      {{-- Xóa --}}
                      <a href="{{ route('admin.products.image-delete', ['MaHinh'=>$image->MaHinh]) }}"
                        class="btn btn-danger">Delete image</a>
                      {{-- <form action="{{ route('admin.products.image-delete', ['MaHinh'=>$image->MaHinh]) }}"
                       method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete image {{ $key  }}</button> --}}
                      </form>
                    {{-- </div> --}}
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Thêm ảnh sản phẩm</label>
          <input class="form-control" multiple type="file" name="other_img[]">
        </div>
        <div class="form-floating mb-3">
          <label for="floatingTextarea2">Mô tả</label>
          <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $product->MoTa }}</textarea>
        </div>
        <div class="form-floating mb-3">
          <label class="form-label" for="flexSwitchCheckDefault">Trưng bày sản phẩm</label>
          <div class="form-check form-switch">
            <input class="form-check-input sell" name="status" value="1" type="checkbox" role="switch" {{ $product->TrangThai==1?'checked':'' }}>
            <label class="form-check-label-label" for="flexSwitchCheckDefault">Có</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input sell" name="status" value="0" type="checkbox" role="switch"  {{ $product->TrangThai==0?'checked':'' }}>
            <label class="form-check-label-label" for="flexSwitchCheckDefault">Không</label>
          </div>
        <div class="form-floating mb-3">
          <label class="form-label" for="flexSwitchCheckDefault">Sản phẩm nổi bật</label>
          <div class="form-check form-switch">
            <input class="form-check-input hot" name="hot" value="1" type="checkbox" role="switch" {{ $product->NoiBat==1?'checked':'' }}>
            <label class="form-check-label-label" for="flexSwitchCheckDefault">Có</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input hot" name="hot" value="0" type="checkbox" role="switch"  {{ $product->NoiBat==0?'checked':'' }}>
            <label class="form-check-label-label" for="flexSwitchCheckDefault">Không</label>
          </div>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Xuất xứ</label>
          <input type="text" name="origin" class="form-control" value="{{ $product->XuatXu }}" placeholder="Xuất xứ...">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Danh mục</label>
          <select class="form-control form-select d-block" name="category_id" aria-label="Default select example">
            @foreach ($categories as $key => $category )
            <option value="{{ $category->MaDM }}" {{ $category->MaDM==$product->MaDM?'selected':'' }}>{{ $category->TenDM }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Khuyến mãi</label>
          <select class="form-control form-select d-block" name="promo_id" aria-label="Default select example">
            @foreach ($promotions as $key => $promo )
            <option value="{{ $promo->MaKM }}" {{ $promo->MaKM==$product->MaKM?'selected':'' }}>{{ $promo->TenKM }}</option>
            @endforeach
          </select>
        </div>
        <!-- /.col -->
        <div class="col-2 mb-3">
          <button type="submit" name="prd_edit_submit" class="btn btn-primary btn-block">Cập nhật</button>
        </div>
        <!-- /.col -->
        @csrf
        @method('PUT')
      </form>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script type="text/javascript">
      CKEDITOR.replace('description');
      $('.sell').on('click', function() { 
        $('.sell').prop('checked', false);
        this.checked = true; 
      });
      $('.hot').on('click', function() { 
        $('.hot').prop('checked', false);
        this.checked = true; 
      });
  </script>
@endsection