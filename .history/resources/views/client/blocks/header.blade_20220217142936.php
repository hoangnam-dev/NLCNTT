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
              <i class="fab fa-facebook header_navbar-icon f-icon"></i>
            </a>
            <a href="https://www.instagram.com/" class="header_navbar-item-link">
              <i class="fab fa-instagram header_navbar-icon f-icon"></i>
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
            <a id="popupLogin" class="btn-modal header_navbar-item-link header_navbar-item-strong"
              data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</a>
          </li>
          <li class="header_navbar-item">
            <a id="popupRegister" class="btn-modal header_navbar-item-link header_navbar-item-strong"
              data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</a>
          </li>

          <!--  Start Login Modal Layout -->
          <div class="mt-1">
            <h3><a href="{{ route('user.login') }}" class="form_heading">Đăng nhập</a></h3>
            <h3><a href="{{ route('user.register') }}" class="form_heading">Đăng ký</a></h3>
            {{-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="form_heading">Đăng Nhập</h3>
                    <div type="button" id="popupRegisterForm" class="text-danger form_switch-btn"
                      data-bs-target="#registerModal" data-bs-toggle="modal">Đăng Ký</div>
                  </div>
                  <div class="modal-body">
                    <form class="mb-3" action="{{ route('user.login') }}" method="POST">
                      @csrf
                      @method('POST')


                      <div class="form-group mb-3">
                        <input type="email" class="form-control" name="user_email" id="email"
                          aria-describedby="emailHelp" placeholder="Enter email">
                        @error('adm_email')
                        <small id="emailError" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group mb-3">
                        <input type="password" class="form-control" name="user_password" id="password"
                          placeholder="Password">
                        @error('adm_email')
                        <small id="passwordError" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                      </div>
                      <div class="mt-4 d-flex justify-content-end">
                        <button type="button" class="btn button-general mr-3" data-bs-dismiss="modal">Trở lại</button>
                        <button type="submit" class="btn btn-danger">Đăng nhập</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div> --}}
            <!-- End Login Modal Layout -->

            <!-- Start Modal Layout Register -->
            {{-- <div class="mt-2">
              <div class="modal fade" id="registerModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="form_heading">Đăng Ký</h3>
                      <div id="popupLoginForm" class="text-danger form_switch-btn" data-bs-target="#loginModal"
                        data-bs-toggle="modal">Đăng Nhập</div>
                    </div>
                    <div class="modal-body mx-3">
                      <form id="form-register" action="{{ route('user.register') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                          <input type="text" id="rg_phone" class="form-control" name="customer_phone"
                            placeholder="Số Điện thoại" />
                          @if(session('phoneErr'))
                          <span id="error-rg_phone" class="error-message">{{ session('phoneErr') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <input type="text" id="rg_username" class="form-control" name="customer_name"
                            placeholder="Họ và tên" />
                          @if(session('nameErr'))
                          <span id="error-rg_name" class="error-message">{{ session('nameErr') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <input type="text" id="rg_email" class="form-control" name="customer_email"
                            placeholder="Email" />
                          @if(session('emailErr'))
                          <span id="error-rg_email" class="error-message">{{ session('emailErr') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <input type="text" id="rg_address" class="form-control" name="customer_address"
                            placeholder="Địa chỉ" />
                          @if(session('addressErr'))
                          <span id="error-rg_address" class="error-message">{{ session('addressErr') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <input type="password" id="rg_password" class="form-control" name="customer_pass"
                            placeholder="Mật Khẩu" />
                          @if(session('passwordErr'))
                          <span id="error-rg_password" class="error-message">{{ session('passwordErr') }}</span>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <input type="password" class="form-control" name="customer_repassword" id="rg_repassword"
                            placeholder="Nhập lại Mật Khẩu" />
                          @if(session('repasswordErr'))
                          <span id="error-rg_repassword" class="error-message">{{ session('repasswordErr') }}</span>
                          @endif
                        </div>
                        <div class="form_policy">
                          <span>
                            Bằng cách ấn vào nút “ĐĂNG KÝ”, tôi đồng ý với
                            <a href="" class="policy-link text-danger"> Điều Khoản Sử Dụng </a>và
                            <a href="" class="policy-link text-danger">Chính Sách Bảo Mật của chúng tôi</a></span>
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                          <button type="button" class="btn button-general mr-4" data-bs-dismiss="modal">Trở lại</button>
                          <button type="submit" class="btn btn-danger">Đăng ký</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}
          <!-- End Register Modal Layout -->
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
<script src="./asset/jquery/jquery.js"></script>
<script src="./asset/jquery/main.js"></script>
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
<!-- <script src="./asset/jquery/jquery.js"></script> -->