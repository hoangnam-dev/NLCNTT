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
                                    value="{{ $category->madm }}" name="category[]" id="flexCheckDefault{{ $category->madm  }}">
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
                          <div class="btn category_link">
                            Tất cả
                          </div>
                        </a>
                      </li>
                      @foreach ($categories as $category)
                      <li class="mb-1">
                        {{-- <a href="{{ route('client.productsbycatergory', ['danh_muc'=>$category->madm]) }}" class="user-link"> --}}
                            {{-- <div class="btn"></div> --}}
                          <div class="btn align-items-center rounded collapsed category_link">
                            {{ $category->tendm }}
                          </div>
                        </a>
                    </li>
                    @endforeach
                    </ul>
                  </div>
            </div>
            <div class="col-md-9">
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
            $(document).ready(function() {
                $('#flexCheckDefault0').click(function() {
                    $('.checkOther .item-checked').prop('checked', false);
                });
                $(".checkOther").click(function() {
                    if(!$('.checkOther .item-checked').is('checked')) {
                        $('#flexCheckDefault0').prop('checked', false);
                    };
                });
            });
            //     var ids = [];

            //     var counter = 0;
            //     $('.item-checked').each(function () {
            //         if ($(this).is(":checked")) {
            //             ids.push($(this).data('id'));
            //             counter++;
            //         }
            //     });


            //     if (counter == 0) {
            //         $('.listPrd').empty();
            //         $('.listPrd').append('No Data Found');
            //     } else {
            //         fetchCauseAgainstCategory(ids);
            //     }
            // });

            // function fetchCauseAgainstCategory(id) {

            //     $('.listPrd').empty();

            //     $.ajax({
            //         type: 'GET',
            //         url: '/danhmuc/' + id,
            //         success: function (response) {
            //             var response = JSON.parse(response);
            //             console.log(response);
                        
            //             if (response.length == 0) {
            //                 $('.listPrd').append('No Data Found');
            //             } else {
            //                 response.forEach(element => {
            //                     $('.listPrd').append(
            //                 `<div class="col-md-4 col-sm-6 col-12">
            //                     <div class="card card-product">
            //                             class="product-img">
            //                         <div class="card-product_img"
            //                             style="background-image: url('{{ asset('assets/uploads/products/${element.avatar}');">
            //                         </div>
            //                         <div class="card-body">
            //                             <h5 class="card-title product_name">${element.tensp}</h5>
            //                         </div>
            //                     </div>
            //                 </div>`);
            //                 });
            //             }
            //         }
            //     });
            // }    
        </script>
    @endsection