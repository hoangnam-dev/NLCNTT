@extends('client.layouts.master')
@section('title')
{{ $title }}
@endsection
@section('content')
{{-- {{ dd( url()->current()) }} --}}
@include('client.blocks.slide')
<div class="container pt-4">
    <div class="row">
        <div class="col-md-3 pe-5">
            {{-- <div class="ctn-filter">
                <div class="ctn-filter_block">
                    <div class="ctn-filter_title mb-3">
                        Danh mục
                    </div>
                    <div class="ctn-filter_list d-flex align-items-start flex-wrap">
                        <div class="form-check cnt-filter_check checkDefault">
                            <input class="form-check-input cnt-filter_checked" type="checkbox" checked value="0"
                                id="flexCheckDefault0">
                            <label class="form-check-label ctn-filter_label" for="flexCheckDefault0">
                                Tất cả
                            </label>
                        </div>
                        @foreach ($categories as $category)
                        <div class="form-check cnt-filter_check checkOther">
                            <input class="form-check-input cnt-filter_checked item-checked" type="checkbox"
                                value="{{ $category->madm }}" name="category[]"
                                id="flexCheckDefault{{ $category->madm  }}">
                            <label class="form-check-label ctn-filter_label"
                                for="flexCheckDefault{{ $category->madm  }}">
                                {{ $category->tendm }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
            <div class="flex-shrink-0 p-3" style="width: 280px;">
                <div class="ctn-filter_title mb-3">
                    Danh mục
                </div>
                <ul class="list-unstyled ps-0">

                    <li class="mb-1">
                        <a href="{{ route('client.catergory') }}" class="user-link">
                            <button type="button" class="category_link">
                                Tất cả
                            </button>
                        </a>
                    </li>
                    @foreach ($categories as $category)
                    <li class="mb-1">
                        {{-- <a href="{{ route('client.productsbycatergory', ['danh_muc'=>$category->madm]) }}"
                            class="user-link"> --}}
                            {{-- <div class="btn"></div> --}}
                            <button type="button" class="category_link" data-id="{{ $category->madm }}">
                                {{ $category->tendm }}
                            </button>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9" id="category-products">
            @include('client.category.listProductByCategory')
        </div>
    </div>
    <div class="row d-flex justify-content-end">
        <div class="col-sm-12 col-md-7">
            {{ $listProducts->appends(request()->all())->links() }}
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$('.category_link').on('click', function () {
    var id = $(this).data('id');
    alert(id);
    $.ajax({
        url: "{{ route('client.productsbycatergory') }}",
        type: "GET",
        data: {
            id: id
        },
        success: function (data) {
            if(data.status == 'success') {
                    // alert(response.status);
                    $('#category-products').html(data.categoryComponent);
                    // location.reload();
                    // console.log(response.cartComponent);
                }
        }
    });
});
</script>
@endsection