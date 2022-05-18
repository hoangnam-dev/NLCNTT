<!-- Footer -->
<footer class="text-center text-lg-start bg-blue text-muted pt-2" style="box-shadow: 0 10px 10px 10px #dcdcdc; font-family:'Roboto Condensed, sans-serif;">
  <!-- Section: Social media -->
  {{-- <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section> --}}
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-5">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>ABCShop
          </h6>
          {{-- <p>
            Choose you phone!!!
          </p> --}}
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Danh mục
          </h6>
          @foreach ($categories as $category)
          <p>
            <a class="text-reset text-decoration-none" href="{{ route('client.productsbycategory', ['danh_muc'=>$category->madm]) }}" class="text-reset">{{ $category->tendm }}</a>
          </p>
          @endforeach
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Mạng xã hội
          </h6>
          <p>
            <a href="#!" class="text-reset text-decoration-none"><i class="fab fa-facebook-f" style="margin-right: 5px; font-size: 16px"></i>&nbsp;Facebook</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none"><i class="fab fa-twitter" style="margin-right: 5px; font-size: 16px"></i>&nbsp;Twitter</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none"><i class="fab fa-instagram" style="margin-right: 5px; font-size: 16px"></i>&nbsp;Istagram</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-decoration-none"><i class="fab fa-youtube" style="margin-right: 5px; font-size: 16px"></i>&nbsp;Youtube</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Cần Thơ, Việt Nam</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            abcshop@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i>0123 456 789</p>
          <p><i class="fas fa-print me-3"></i>0987 654 321</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    <a class="text-reset fw-bold text-decoration-none" href="{{ route('client.home') }}">ABCShop.</a>
    &nbsp;Design by Hoang Nam.
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->