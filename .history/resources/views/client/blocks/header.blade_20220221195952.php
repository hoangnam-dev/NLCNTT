<header class="header">
  <div class="header_top">
    <div class="grid">

      <!-- Navbar -->
      <nav class="header_navbar">
        <!-- Nav-Left -->
        <ul class="header_navbar-list">
          <li class="header_navbar-item">
            <a class="header_navbar-item-link" href="#support" target="_self">Hổ trợ</a>
          </li>
          <li class="header_navbar-item">
            <span class="header_navbar-title-no-pointer">Liên hệ chúng tôi</span>
            <a href="https://www.facebook.com/" class="header_navbar-item-link">
              {{-- <i class="fab fa-facebook header_navbar-icon f-icon"></i> --}}
              <i class="fa-brands fa-facebook header_navbar-icon f-icon"></i>
            </a>
            <a href="https://www.instagram.com/" class="header_navbar-item-link">
              {{-- <i class="fab fa-instagram header_navbar-icon f-icon"></i> --}}
              <i class="fa-brands fa-instagram header_navbar-icon f-icon"></i>
            </a>
          </li>
        </ul>
        <!-- Nav-Right -->
        <ul class="header_navbar-list">

          <!-- Has Login -->
          @if (Auth::check())
          <li class="header_navbar-item header_navbar-user">
            <img src="{{ asset('assets/client/images/img-user.jpg') }}" alt="user-img" class="user-img">
            {{-- @if(session('Err'))
            <span id="user" class="header_navbar-username">User</span>
            @endif --}}
            <span id="user" class="header_navbar-username">{{ Auth::user()->tenkh }}</span>
            <ul class="user_menu">
              <li class="user_menu-item">
                <a href="#">Quản lý tài khoản</a>
              </li>
              <li class="user_menu-item">
                <a href="./order.php">Đơn hàng</a>
              </li>
              <li class="user_menu-item user_menu-item-separate">
                <a href="{{ route('user.logout') }}">Đăng xuất</a>
              </li>
            </ul>
          </li>

          @else


          <!-- Hasn't Login -->
          <li class="header_navbar-item header_navbar-item-separate">
            <a class="btn-modal header_navbar-item-link header_navbar-item-strong"
              href="{{ route('user.login') }}">Đăng nhập</a>
          </li>
          <li class="header_navbar-item">
            <a class="btn-modal header_navbar-item-link header_navbar-item-strong"
              href="{{ route('user.register') }}">Đăng ký</a>
          </li>

          <!--  Start LogiModal Layout -->
          @endif

        </ul>
      </nav>

      <!-- Search -->
      <div class="header-of-search">
        <div class="header_logo">
          <img class="logo_img" src="{{ asset('assets/uploads/web_logo.png') }}" alt="logo">
          <span class="store-name">HNStore</span>
        </div>
        <div class="header_search">
          <form action="#" class="header_search" method="GET">
            <input type="text" name="search" class="header_search-input" placeholder="Tìm kiếm...">
            <button class="header_search-btn">
              <i class="fas fa-search header_search-icon f-icon"></i>
            </button>
          </form>

        </div>

        <!-- Shopping Cart -->
        <div class="header_cart">
          <a href="#" class="icon-of-cart">
            <i class="header_cart-icon fas fa-shopping-cart f-icon"></i>

          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="header_bottom">
    <div class="grid">
      <nav class="header_menu">
        <ul class="header_menu-list">
          <li class="header_menu-item">
            <a href="#" class="header_menu-item-link">Apple</a>
          </li>
          <li class="header_menu-item">
            <a href="#" class="header_menu-item-link">Samsung</a>
          </li>
          <li class="header_menu-item">
            <a href="#" class="header_menu-item-link">Vsmart</a>
          </li>
          <li class="header_menu-item">
            <a href="#" class="header_menu-item-link">Xiaomi</a>
          </li>
          <li class="header_menu-item">
            <a href="#" class="header_menu-item-link">Oppo</a>
          </li>
          <li class="header_menu-item">
            <a href="#" class="header_menu-item-link">Realme</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>




<!-- =============== SCRIPT =============== -->
{{-- <script src="./asset/jquery/jquery.js"></script>
<script src="./asset/jquery/main.js"></script> --}}
@section('js')
<script>
  $(document).ready(function(){ 

            $('#loginModal').click(function(e){ 

                e.preventDefault(); 

                $.ajaxSetup({ 

                    headers: { 

                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') 

                    } 

                }); 

                $.ajax({ 

                    url: "{{ route('user.login') }}", 

                    type: 'post', 

                    data: { 
                        "_token": '{{ csrf_token() }}',
                        "email": $('#email').val(), 
                        "password": $('#password').val(), 

                        // auther_name: $('#auther_name').val(), 

                        // description: $('#description').val(), 

                    }, 

                    success: function(result){ 

                        if(result.error==0 )
                        { 
                          alert(result.message);
                            // $('.alert-danger').html(''); 

 

                            // $.each(result.error, function(key, value){ 

                            //     $('.alert-danger').show(); 

                            //     $('.alert-danger').append('<li>'+value+'</li>'); 

                            // }); 

                        } 

                        else 

                        { 
                            alert(result.message);
                            $('.alert-danger').hide(); 

                            $('#loginModal').modal('hide'); 

                        } 

                    } 

                }); 

            }); 

        }); 

</script>
@endsection
<!-- <script src="./asset/jquery/jquery.js"></script> -->