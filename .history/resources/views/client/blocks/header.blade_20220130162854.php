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
              <i class="fab fa-facebook header_navbar-icon"></i>
            </a>
            <a href="https://www.instagram.com/" class="header_navbar-item-link">
              <i class="fab fa-instagram header_navbar-icon"></i>
            </a>
          </li>
        </ul>
        <!-- Nav-Right -->
        <ul class="header_navbar-list">

          <!-- Has Login -->
          {{-- <li class="header_navbar-item header_navbar-user">
            <img src="./asset/img/img-user.jpg" alt="user-img" class="user-img">
            <span id="user" class="header_navbar-username">User</span>
            <ul class="user_menu">
              <li class="user_menu-item">
                <a href="#">Quản lý tài khoản</a>
              </li>
              <li class="user_menu-item">
                <a href="./order.php">Đơn hàng</a>
              </li>
              <li class="user_menu-item user_menu-item-separate">
                <a href="./process.php?action=logout">Đăng xuất</a>
              </li>
            </ul>
          </li> --}}

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
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                   <h3 class="form_heading">Đăng Nhập</h3>
                    <button type="button" id="popupRegisterForm" class="btn btn-primary form_switch-btn" data-bs-target="#registerModal" data-bs-toggle="modal">Đăng Ký</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-general">
                      <form id="form-login" class="form" method="POST" role="form">
                        <div class="form-container">
                          <div class="form_header">
                            <h3 class="form_heading">Đăng Nhập</h3>
                            <button type="button"  id="popupRegisterForm" class="btn btn-primary form_switch-btn" data-bs-target="#registerModal" data-bs-toggle="modal">Đăng Ký</button>
                          </div>
                          <div class="form_group">
                            <input type="text" id="lg_phone" class="form_input" name="phone"
                              placeholder="Số Điện thoại" />
                            <span id="error-lg_phone" class="error-message"></span>
                          </div>
                          <div class="form_group">
                            <input type="password" id="lg_password" class="form_input" name="password"
                              placeholder="Mật Khẩu" />
                            <span id="error-lg_password" class="error-message"></span>
                          </div>
                          <div class="form_control">
                            <button type="button" class="close button form_control-back button-normal"
                              data-bs-dismiss="modal">Trở
                              Lại</button>
                            <input type="submit" name="submit" class="button button_general" value="Đăng Nhập" />
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Login Modal Layout -->

            <!-- Start Modal Layout Register -->
            <div class="mt-2">
              <div class="modal fade" id="registerModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="registerModalTitle">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-general">
                        <form id="form-register" class="form" method="POST" id="form-register">
                          <div class="form-container">
                            <div class="form_header">
                              <h3 class="form_heading">Đăng Ký</h3>
                              <button type="button"  id="popupLoginForm" class="btn btn-primary form_switch-btn" data-bs-target="#loginModal" data-bs-toggle="modal">Đăng Nhập</button>
                            </div>
                            <div class="form_group">
                              <input type="text" id="rg_phone" class="form_input" name="phone"
                                placeholder="Số Điện thoại" />
                              <span id="error-rg_phone" class="error-message"></span>
                            </div>
                            <div class="form_group">
                              <input type="text" id="rg_username" class="form_input" name="name"
                                placeholder="Họ và tên" />
                              <span id="error-rg_name" class="error-message"></span>
                            </div>
                            <div class="form_group">
                              <input type="text" id="rg_address" class="form_input" name="address"
                                placeholder="Địa chỉ" />
                              <span id="error-rg_address" class="error-message"></span>
                            </div>
                            <div class="form_group">
                              <input type="password" id="rg_password" class="form_input" name="password"
                                placeholder="Mật Khẩu" />
                              <span id="error-rg_password" class="error-message"></span>
                            </div>
                            <div class="form_group">
                              <input type="password" class="form_input" name="repassword" id="rg_repassword"
                                placeholder="Nhập lại Mật Khẩu" />
                              <span id="error-rg_repassword" class="error-message"></span>
                            </div>
                            <div class="form_policy">
                              <span>
                                Bằng cách ấn vào nút “ĐĂNG KÝ”, tôi đồng ý với
                                <a href="" class="policy-link"> Điều Khoản Sử Dụng </a>và
                                <a href="" class="policy-link">Chính Sách Bảo Mật của chúng tôi</a></span>
                            </div>
                            <div class="form_control">
                              <button type="button" id="rgclose"
                                class="close button form_control-back button-normal" data-bs-dismiss="modal">Trở Lại</button>
                              <input type="submit" name="submit" class="button button_general lg_submit"
                                value="Đăng Ký" />
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Register Modal Layout -->

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
              <i class="fas fa-search header_search-icon"></i>
            </button>
          </form>

        </div>

        <!-- Shopping Cart -->
        <div class="header_cart">
          <a href="#" class="icon-of-cart">
            <i class="header_cart-icon fas fa-shopping-cart"></i>

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

{{-- @section('js')
<script type="text/javascript">
  $(document).on('hidden.bs.modal', function () {
      if ($('.modal:visible').length) {
        $('body').addClass('modal-open');
      }
    });
</script>
@endsection --}}





<!-- =============== SCRIPT =============== -->
{{-- <script src="./asset/jquery/jquery.js"></script>
<script src="./asset/jquery/main.js"></script>
<script>
  // Ajax
        // Login
        $("#form-login").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "./process.php?login",
                data: $(this).serializeArray(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == "0") {
                        alert(response.message);
                        console.log(response.message);
                    } else {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });
        // Register
        $("#form-register").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "./process.php?register",
                data: $(this).serializeArray(),
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status == "0") {
                        alert(response.message);
                        console.log(response.message);
                    } else {
                        alert(response.message);
                        location.reload();
                    }
                }
            });
        });


        // Validate
        <?php if (empty($user)) { ?>
            // Lấy đối tượng Login
            var popupLogin = document.getElementById("popupLogin");
            var popupLoginClose = document.getElementById("lgclose");

            // Thêm sự kiện cho đối tượng
            popupLogin.addEventListener("click", function() {
                popupOpen("modalLg");
            });
            popupLoginClose.addEventListener("click", function() {
                popupClose("modalLg");
            });
            // Lấy đối tượng Register
            var popupRegister = document.getElementById("popupRegister");
            var popupRegisterClose = document.getElementById("rgclose");
            // Thêm sự kiện cho đối tượng
            popupRegister.addEventListener("click", function() {
                popupOpen("modalRg");
            });
            popupRegisterClose.addEventListener("click", function() {
                popupClose("modalRg");
            });

            // Mở Form Login từ Form Register 
            var popupRF = document.getElementById("popupRegisterForm");
            popupRF.addEventListener("click", function() {
                popupClose("modalLg");
                popupOpen("modalRg");
            });

            // Mở Form Register từ Form Login 
            var popupLF = document.getElementById("popupLoginForm");
            popupLF.addEventListener("click", function() {
                popupClose("modalRg");
                popupOpen("modalLg");
            });
        <?php } ?>


        function getElement(id) {
            return document.getElementById(id).value.trim();
        }

        function validateRg() {
            var phone = getElement("rg_phone");
            var name = getElement("rg_username");
            var address = getElement("rg_address");
            var password = getElement("rg_password");
            var repassword = getElement("rg_repassword");

            var flag = true;

            if (phone != "") {
                if (!/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(phone)) {
                    flag = false;
                    message = "Vui lòng kiểm tra lại số điện thoại của bạn";
                    showErr("rg_phone", message);
                } else {
                    showErr("rg_phone", "");
                }
            } else {
                flag = false;
                message = "Vui lòng nhập vào số điện thoại của bạn";
                showErr("rg_phone", message);
            }

            if (name != "") {
                if (!/[a-zA-Z0-9]/.test(name)) {
                    flag = false;
                    message = "Vui lòng nhập vào họ tên của bạn";
                    showErr("rg_name", message);
                } else {
                    showErr("rg_name", "");
                }
            } else {
                flag = false;
                message = "Vui lòng nhập vào họ tên của bạn";
                showErr("rg_name", message);
            }

            if (address == "") {
                flag = false;
                message = "Vui lòng nhập vào địa chỉ của bạn";
                showErr("rg_address", message);
            } else {
                showErr("rg_address", "");
            }

            if (password == "") {
                flag = false;
                message = "Vui lòng nhập vào mật khẩu của bạn";
                showErr("rg_password", message);
            } else {
                showErr("rg_password", "");
            }
            if (repassword != "") {
                if (repassword != password) {
                    flag = false;
                    message = "Vui lòng kiểm tra lại Mật khẩu nhập lại";
                    showErr("rg_repassword", message);
                } else {
                    showErr("rg_repassword", "");
                }
            } else {
                flag = false;
                message = "Trường này không được để trống";
                showErr("rg_repassword", message);
            }
            return flag;
        }
        // Validate Login Form
        function validateLg() {
            var phone = getElement("lg_phone");
            var password = getElement("lg_password");

            var flag = true;

            if (phone != "") {
                if (!/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(phone)) {
                    flag = false;
                    message = "Vui lòng kiểm tra lại số điện thoại của bạn";
                    showErr("lg_phone", message);
                } else {
                    showErr("lg_phone", "");
                }
            } else {
                flag = false;
                message = "Vui lòng nhập vào số điện thoại của bạn";
                showErr("lg_phone", message);
            }

            if (password == "") {
                flag = false;
                message = "Vui lòng nhập vào mật khẩu của bạn";
                showErr("lg_password", message);
            } else {
                showErr("lg_password", "");
            }
            return flag;
        }
</script>
<!-- <script src="./asset/jquery/jquery.js"></script> --> --}}