<div class="cnt-content">
    <div class="cnt-content_title border border-light shadow-sm p-3 mb-3 rounded title-font">
        {{ $categoryName }}
    </div>
    <div class="cnt-listProducts border border-light shadow-sm p-3 rounded">
        <div class="row listPrd">
            {{-- {{ dd($listProducts) }} --}}
            @foreach ($listProducts as $value)
            <div class="col-md-4 col-sm-6 col-12 prd-item">
                <div class="card card-product">
                    <a href="{{ route('client.product-detail', ['masp'=>$value->masp]) }}"
                        class="product-img">
                        <div class="card-product_img"
                            style="background-image: url('{{ asset('assets/uploads/products/'.$value->avatar)}}');">
                        </div>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title product_name">{{ $value->tensp }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="card-text new-price text-danger">{{ number_format($value->giaban -
                                (($value->giaban * $value->giatri)/100),'0',',','.') }} VNĐ</span>
                            @if ($value->giatri!==0)
                            <span class="card-text old-price"> {{ number_format($value->giaban,'0',',','.')
                                }}
                                VNĐ</span>
                            @endif
                        </div>
                        <div class="form-group product-rating d-flex justify-content-center align-items-center">
                            <div class="product_rating">
                              @for ($i = 1; $i <= 5; $i++)
                                  @if ($i <= round($value->danhgiatb))
                                      <i class="fas fa-star start-icon start_rating"></i>
                                  @else
                                      <i class="fas fa-star start-icon"></i>
                                  @endif
                              @endfor
                            </div>
                            <span class="text-muted">{{ round($value->danhgiatb,1) }}</span>
                          </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('client.product-detail', ['masp'=>$value->masp]) }}"
                                class="btn btn-outline-warning btn-detail">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>