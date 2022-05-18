@foreach ($attributes as $attr)
@php
  $attribute = $attr;
@endphp
<div id="product-attributes">
<div class="mb-3">
    <label for="" class="form-label">{{ $attr->tentt }}</label>
    <input type="hidden" name="matt[]" value="{{ $attribute->matt }}">
    <div class="input-group">
      <select class="form-control form-select d-block mb-2" name="giatri_tt[]">
        @foreach ($attr->hasAttributeDetail  as $key => $value )
        <option value="{{ $value->giatri }}">{{ $value->giatri }}</option>
        @endforeach
      </select>
      <button type="button" class="btn btn-info add_attr mb-3" data-toggle="modal" data-target="#exampleModal" data-attr_id="{{ $attribute->matt }}" data-whatever="@getbootstrap">Thêm giá trị</button>
    </div>
  </div>
</div>
@endforeach