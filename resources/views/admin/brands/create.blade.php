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
          <form action="{{ route('admin.brands.brand-create') }}" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Tên hãng sản xuất</label>
              <input type="text" name="brand_name" class="form-control" placeholder="Nhập tên hãng sản xuất..." value="{{ old('brand_name') }}">
              {{-- <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div> --}}
              </div>
              @error('brand_name')
              <div class="input-group">
                  <p class="text-danger">{{ $message }}</p>
              </div>
              @enderror
            </div>
              <!-- /.col -->
              <div class="col-3">
                <button type="submit" name="create_brand" class="btn btn-primary btn-block">Thêm mới</button>
              </div>
            </div>
      
            @csrf
          </form>
    </div>
  </div>
</div>
@endsection