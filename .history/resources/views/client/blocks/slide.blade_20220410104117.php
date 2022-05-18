{{-- {{ dd($sliders) }} --}}
<div id="carouselExampleIndicators" class="carousel slide mt-2" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @for ($i = 0; $i < count($sliders); $i++)
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="{{ $i==0?'active':'' }}" aria-current="true" aria-label="Slide {{ $i+1 }}"></button>
    @endfor
    {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button> --}}
  </div>
  <div class="carousel-inner">
    @foreach ($sliders as $key => $item)
    <div class="carousel-item {{ $key==0?'active':'' }}">
      <img src="{{ asset('assets/uploads/sliders/'.$item['slider']) }}" class="d-block w-75 mx-auto" alt="{{ asset('assets/uploads/sliders/'.$item['slider']) }}">
    </div>
    @endforeach
    {{-- <div class="carousel-item">
      <img src="{{ asset('assets/uploads/sliders/slider6.jpg') }}" class="d-block w-75 mx-auto" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/uploads/sliders/slider7.jpg') }}" class="d-block w-75 mx-auto" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/uploads/sliders/slider8.jpg') }}" class="d-block w-75 mx-auto" alt="...">
    </div> --}}
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" style="background-color: #333" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" style="background-color: #333" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>