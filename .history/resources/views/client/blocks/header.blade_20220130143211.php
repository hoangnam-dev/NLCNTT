<div class="mb-5">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <h2>Sản phẩm nổi bật</h2>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($hot_prds as $value)
        <div class="col">
          <div class="card h-100">
            <img src="{{ asset('assets/uploads/products').'/'.$value->avatar }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $value->tensp }}</h5>
              <h6 class="text-danger">{{ number_format($value->gaiban,'0',',','.') }} VNĐ</h6>
              <p class="card-text">Điện thoại abcs hot</p>
            </div>
            <div class="card-footer">
              <small class="btn btn-info col-12">Chi tiết</small>
            </div>
          </div>
        </div>
        @endforeach
      </div>
</div>
</div>