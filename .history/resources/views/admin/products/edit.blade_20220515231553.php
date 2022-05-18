@extends('admin.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="ml-3">
      @if (session('status'))
      <div id="msg" class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <form action="{{ route('admin.products.product-edit', ['masp'=>$product->masp]) }}" method="POST"
        enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Tên sản phẩm</label>
          <input type="text" class="form-control" name="name" value="{{ $product->tensp }}">
        </div>
        @error('name')
        <div class="input-group mb-3">
          <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror

        {{-- -------------------- --}}
        <div class="mb-3">
          <label for="" class="form-label">Số lượng</label>
          <input type="text" name="quantity" class="form-control" value="{{ $product->soluong }}">
        </div>
        @error('quantity')
        <div class="input-group mb-3">
          <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror

        {{-- -------------------- --}}
        <div class="mb-3">
          <label for="" class="form-label">Giá bán (VNĐ)</label>
          <input type="text" name="price" class="form-control"
            value="{{ number_format($product->giaban, 0, ',', '.') }}">
        </div>
        @error('price')
        <div class="input-group mb-3">
          <p class="text-danger">{{ $message }}</p>
        </div>
        @enderror

        {{-- -------------------- --}}
        <div class="mb-3">
          <label for="formFile" class="form-label">Ảnh đại diện</label>
          <div class="images">
            <img src="{{ asset('assets/uploads/products').'/'.$product->avatar }}" class="img-fluid"
              alt="{{ $product->avatar }}">
            <input type="hidden" name="avatar" value="{{ $product->avatar }}">
          </div>
        </div>

        {{-- -------------------- --}}
        <div class="mb-3">
          <label for="formFile" class="form-label">Thay đổi ảnh đại diện</label>
          <input class="form-control" type="file" name="new_avatar">
        </div>

        {{-- -------------------- --}}
        <div class="mb-3">
          <label for="formFile" class="form-label">Ảnh khác</label>
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
                  <img style="width: 150px;" src="{{ asset('assets/uploads/products').'/'.$image->hinhanh }}"
                    class="img-fluid" alt="{{ $image->hinhanh }}">
                </td>
                <td>
                  {{-- <div class="row"> --}}
                    {{-- Xóa --}}
                    <a href="{{ route('admin.products.image-delete', ['mahinh'=>$image->mahinh]) }}"
                      class="btn btn-danger">Delete image</a>
                    {{-- <form action="{{ route('admin.products.image-delete', ['mahinh'=>$image->mahinh]) }}"
                      method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">Delete image {{ $key }}</button>
                    </form>

                  </div> --}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- -------------------- --}}
        <div class="mb-3">
          <label for="formFile" class="form-label">Thêm ảnh sản phẩm</label>
          <input class="form-control" multiple type="file" name="other_img[]">
        </div>

        {{-- -------------------- --}}
        <div class="form-floating mb-3">
          <label for="floatingTextarea2">Mô tả</label>
          <textarea name="description" id="description" class="form-control" cols="60"
            rows="10">{{ $product->mota }}</textarea>
          {{-- <input type="text" name="description" id="description" class="form-control" cols="30" rows="10"
            value="{{ $product->mota }}"> --}}
        </div>

        {{-- -------------------- --}}
        <div class="form-floating mb-3">
          <label class="form-label" for="flexSwitchCheckDefault">Trưng bày sản phẩm</label>
          <div class="form-check form-switch">
            <input class="form-check-input sell" name="status" value="1" type="checkbox" role="switch" {{
              $product->trangthai==1?'checked':'' }}>
            <label class="form-check-label-label" for="flexSwitchCheckDefault">Có</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input sell" name="status" value="0" type="checkbox" role="switch" {{
              $product->trangthai==0?'checked':'' }}>
            <label class="form-check-label-label" for="flexSwitchCheckDefault">Không</label>
          </div>

          {{-- -------------------- --}}
          <div class="form-floating mb-3">
            <label class="form-label" for="flexSwitchCheckDefault">Sản phẩm nổi bật</label>
            <div class="form-check form-switch">
              <input class="form-check-input hot" name="hot" value="1" type="checkbox" role="switch" {{
                $product->noibat==1?'checked':'' }}>
              <label class="form-check-label-label" for="flexSwitchCheckDefault">Có</label>
            </div>
            <div class="form-check form-switch">
              <input class="form-check-input hot" name="hot" value="0" type="checkbox" role="switch" {{
                $product->noibat==0?'checked':'' }}>
              <label class="form-check-label-label" for="flexSwitchCheckDefault">Không</label>
            </div>
          </div>

          {{-- -------------------- --}}
          <div class="mb-3">
            <label for="" class="form-label">Xuất xứ</label>
            <input type="text" name="origin" class="form-control" value="{{ $product->xuatxu }}"
              placeholder="Xuất xứ...">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Danh mục</label>
            <select class="form-control form-select d-block" name="category_id" aria-label="Default select example">
              @foreach ($categories as $key => $category )
              <option value="{{ $category->madm }}" {{ $category->madm==$product->madm?'selected':'' }}>{{
                $category->tendm }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Khuyến mãi</label>
            <select class="form-control form-select d-block" name="promo_id" aria-label="Default select example">
              @foreach ($promotions as $key => $promo )
              <option value="{{ $promo->makm }}" {{ $promo->makm==$product->makm?'selected':'' }}>{{ $promo->tenkm }}
              </option>
              @endforeach
            </select>
          </div>

          {{-- --------------------------------- --}}
          <hr class="mb-3">
          <div class="mb-3">
            <h3 class="mb-3">Thuộc tính sản phẩm</h3>
          </div>
          @if (!empty($product->hasProductDetail))
          @foreach ($product->hasProductDetail as $attribute)
          @php
          $attr = '\App\Models\Attributes'::where('matt', $attribute->matt)->with('hasAttributeDetail')->first();
          @endphp
          <div class="mb-3">
            <label for="" class="form-label">{{ $attr->tentt }}</label>
            <input type="hidden" name="matt[]" value="{{ $attribute->matt }}">
            <div class="input-group">
              <select class="form-control form-select d-block mb-2" name="giatri_tt[]">
                @foreach ($attr->hasAttributeDetail as $key => $value )
                <option value="{{ $value->giatri }}" {{ $value->giatri==$attribute->giatritt?'selected':'' }}>{{
                  $value->giatri }}</option>
                @endforeach
              </select>
              <button type="button" class="btn btn-primary mb-3 add_attr" data-toggle="modal"
                data-target="#exampleModal" data-attr_id="{{ $attribute->matt }}" data-whatever="@getbootstrap">Thêm giá
                trị</button>
            </div>

          </div>
          {{-- <div id="product-attributes">
            @include('admin.products.attributes')
          </div> --}}

          @endforeach
          @endif

          @if (!empty($othersAttr->toArray()))
          @php
          $attributes = $othersAttr
          @endphp
          <hr class="mt-2">
          <div class="text-bold mb-2" style="font-size: 18px">Thuộc tính chưa chọn</div>
          @foreach ($attributes as $attr)
          @php
          $attribute = $attr;
          @endphp
          <div id="product-attributes">
            <div class="mb-3">
              <label for="" class="form-label">{{ $attr->tentt }}</label>
              <input type="hidden" name="matt_moi[]" value="{{ $attribute->matt }}">
              <div class="input-group">
                <select class="form-control form-select d-block mb-2" name="giatri_moi[]">
                  <option value="0" selected>Chưa chọn</option>
                  @foreach ($attr->hasAttributeDetail as $key => $value )
                  <option value="{{ $value->giatri }}" {{ $value->giatri==$attribute->giatritt?'selected':'' }}>{{
                    $value->giatri }}</option>
                  @endforeach
                </select>
                <button type="button" class="btn btn-info add_attr mb-3" data-toggle="modal" data-target="#exampleModal"
                  data-attr_id="{{ $attribute->matt }}" data-whatever="@getbootstrap">Thêm giá trị</button>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          {{-- <div id="other-attributes">
            @include('admin.products.attributes')
            @endif
          </div> --}}
          <!-- /.col -->
          <hr class="my-4">
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
{{-- <button class=" btn btn-danger test">test</button> --}}
@include('admin.blocks.add-Attribute')
@endsection
@section('js')
<script type="text/javascript">
  $('.test').click(function(){
  reload();
});
  $('.sell').on('click', function() { 
    $('.sell').prop('checked', false);
    this.checked = true; 
  });
  $('.hot').on('click', function() { 
    $('.hot').prop('checked', false);
    this.checked = true; 
  });
  
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
          // $('#exampleModal').modal('hide')
          location.reload();
        }
        else if(response.status == 'error') {
          alert('Thêm thuộc tính không thành công')
        }
      }
    });
  });
</script>
<script src={{ asset('assets/admin/ckeditor/ckeditor.js') }}></script>
<script>
  CKEDITOR.replace( 'description', {
      
      filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
      filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
      filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123", 
      filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files", 
      filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
      filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
  } );
</script>
@include('ckfinder::setup')
@endsection