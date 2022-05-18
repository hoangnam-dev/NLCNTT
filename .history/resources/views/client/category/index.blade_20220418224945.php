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
                        <a href="{{ route('client.category') }}" class="user-link">
                            <button type="button" data-id="0" class="category_link category-link_active">
                                Tất cả
                            </button>
                        </a>
                    </li>
                    @foreach ($categories as $category)
                    <li class="mb-1">
                        {{-- <a href="{{ route('client.productsbycatergory', ['danh_muc'=>$category->madm]) }}"
                            class="user-link"> --}}
                            {{-- <div class="btn"></div> --}}
                            <button type="button" class="category_link" data-id="{{ $category->madm }}" data-url="{{ route('client.productsbycategory', ['danh_muc'=>$category->madm]) }}">
                                {{ $category->tendm }}
                            </button>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex-shrink-0 p-3" style="width: 280px;">
                <div class="ctn-filter_title mb-3">
                   Lọc theo giá
                </div>
                <form action="{{ route('client.category.sort-price') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id" value="1">
                    <select class="form-select mb-3" name="sort_price" aria-label="Default select example">
                        <option selected value="0-2000000">Dưới 2 triệu</option>
                        <option value="2000000-5000000">Từ 2 đến 5 triệu</option>
                        <option value="=5000000-8000000">Từ 5 đến 8 triệu</option>
                        <option value="=8000000-14000000">Từ 8 đến 14 triệu</option>
                        <option value="=14000000-100000000">Trên 14 triệu</option>
                      </select>
                    <button id="sort-price" type="submit" class="btn btn-warning" data-url="{{ route('client.category.sort-price') }}">
                        Lọc
                    </button>
                </form>
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
    var url = $(this).data('url');
    var id = $(this).data('id');
    $('.category_link').removeClass('category-link_active');
    $(this).addClass('category-link_active');
    $.ajax({
        url: url,
        type: "GET",
        data: {
            id: id
        },
        success: function (data) {
            // if(data.status == 'success') {
            //     $('#category-products').html(data.categoryComponent);
            // }
            console.log(data);
        }
    });
});

// $('#sort-price').on('click', function () {
//     var category_id = $('.category-link_active').data('id');
//     var sort_price = $('select[name="sort_price"]').val();
//     var url = $(this).data('url');
//     // alert(sort_price + ' ' + url);
//     $.ajax({
//         url: url,
//         type: "POST",
//         data: {
//             'category_id': category_id
//         },
//         success: function (data) {
//             if(data.status == 'success') {
//                     $('#category-products').html(data.categoryComponent);
//                 }
//         }
//     });
// });
</script>
@endsection