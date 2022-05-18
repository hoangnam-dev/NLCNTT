<hr class="mb-3">
          <div class="mb-3">
            <h3 class="mb-3">Thuộc tính sản phẩm</h3>
          </div>
          @if (!empty($product->hasProductDetail))              
          @foreach ($product->hasProductDetail as $attribute)
          @php
              $attr = '\App\Models\Attributes'::where('matt', $attribute->matt)->with('hasAttributeDetail')->first();
              @endphp
            {{-- <div class="mb-3">
              <label for="" class="form-label">{{ $attr->tentt }}</label>
              <input type="hidden" name="matt[]" value="{{ $attribute->matt }}">
              <select class="form-control form-select d-block mb-2" name="giatri_tt[]">
                @foreach ($attr->hasAttributeDetail as $key => $value )
                <option value="{{ $value->giatri }}" {{ $value->giatri==$attribute->giatritt?'selected':'' }}>{{ $value->giatri }}</option>
              @endforeach
              </select>
              <button type="button" class="btn btn-primary mb-3 add_attr" data-toggle="modal" data-target="#exampleModal" data-attr_id="{{ $attribute->matt }}" data-whatever="@getbootstrap">Thêm giá trị</button>

            </div> --}}
            <div id="product-attributes">
              @include('admin.products.attributes')
            </div>

          @endforeach
          @endif

          @if (!empty($othersAttr->toArray()))
          <hr class="mt-2">
          <div class="text-muted mb-2" style="font-size: 18px">Thuộc tính chưa chọn</div>
          @foreach ($othersAttr as $attr)
          <div class="mb-3">
            <label for="" class="form-label">{{ $attr->tentt }}</label>
            <input type="hidden" name="matt_moi[]" value="{{ $attr->matt }}">
            <div class="input-group">
              <select class="form-control form-select d-block mb-2" name="giatri_moi[]">
                <option value="" selected>Chưa chọn</option>
                @foreach ($attr->hasAttributeDetail  as $key => $value )
                <option value="{{ $value->giatri }}">{{ $value->giatri }}</option>
                @endforeach
              </select>
              <button type="button" class="btn btn-info add_attr mb-3" data-toggle="modal" data-target="#exampleModal" data-attr_id="{{ $attr->matt }}" data-whatever="@getbootstrap">Thêm giá trị</button>
            </div>
          </div>
          @endforeach
          @endif
          <!-- /.col -->