@extends('admin.layouts.master')
@section('title')
    {{ $title }}    
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="ml-3">
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      <form action="{{ route('admin.roles.role-edit', ['maquyen'=>$role->maquyen]) }}" class="col-12" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label class="form-label">Tên quyền</label>
          <input type="text" name="role_name" class="form-control" value="{{ $role->tenquyen }}">
          @error('role_name')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">Tên hiển thị</label>
          <input type="text" name="role_fullname" class="form-control" value="{{ $role->tenhienthi }}">
          @error('role_fullname')
          <div class="mb-3">
            <p class="text-danger">{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="form-floating mb-3">
            <label for="floatingTextarea2">Mô tả</label>
            <textarea name="role_description" class="form-control" cols="30"
                rows="10">{{ $role->mota }}</textarea>
            @error('role_description')
            <div class="mb-3">
                <p class="text-danger">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <!-- /.col -->
        <div class="row">
          <div class="col-3">
            <button type="submit" name="create_category" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection