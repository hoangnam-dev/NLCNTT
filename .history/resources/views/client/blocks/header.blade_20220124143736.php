{{-- <header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-between">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 me-3 text-white text-decoration-none">
        <h2>ABCShop</h2>
      </a>
      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 flex-grow-1">
        <input type="search" name="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
      </form>

      <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2">Login</button>
        <button type="button" class="btn btn-warning">Sign-up</button>
      </div>
    </div>
  </div>
</header>
<nav class="py-2 bg-light border-bottom sticky-top">
  <div class="container">
    <ul class="nav nav-pills nav-fill justify-content-around justify-content-lg-around">
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2 active" aria-current="page">Trang chủ</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Danh mục
        </a>
        <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Giới thiệu</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Liên hệ</a></li>
      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Giỏ hàng</a></li>
    </ul>
  </div>
</nav> --}}

{{-- <!DOCTYPE html>
<html lang="en">

<body>
    <header class="header"> --}}
        <div class="header_top">
            <div class="grid">
              <!-- Navbar -->
              <nav class="header_navbar">
                  <!-- Nav-Left -->
                  <ul class="header_navbar-list">
                      <li  class="header_navbar-item">
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
                        <span id="user" class="header_navbar-username"></span>
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
                        <a id="popupLogin" class="btn-modal header_navbar-item-link header_navbar-item-strong">Đăng nhập</a>
                    </li>
                    <li class="header_navbar-item">
                        <a id="popupRegister" class="btn-modal header_navbar-item-link header_navbar-item-strong">Đăng ký</a>
                    </li>

                    <!-- Start Modal Layout -->
                    <!--  Start Login Modal Layout -->
                    <div id="modalLg" class="modal">
                        <div class="modal_overlay"></div>
                        <div class="modal_body">
                            <div class="form-general">
                                <form id="form-login" class="form" method="POST" role="form">
                                    <div class="form-container">
                                        <div class="form_header">
                                            <h3 class="form_heading">Đăng Nhập</h3>
                                            <a id="popupRegisterForm" class="form_switch-btn">Đăng Ký</a>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" id="lg_phone" class="form_input" name="phone" placeholder="Số Điện thoại" />
                                            <span id="error-lg_phone" class="error-message"></span>
                                        </div>
                                        <div class="form_group">
                                            <input type="password" id="lg_password" class="form_input" name="password" placeholder="Mật Khẩu" />
                                            <span id="error-lg_password" class="error-message"></span>
                                        </div>
                                        <div class="form_control">
                                            <button type="button" id="lgclose" class="close button form_control-back button-normal">Trở Lại</button>
                                            <input type="submit" name="submit" class="button button_general" value="Đăng Nhập" onclick="return validateLg();">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Login Modal Layout -->

                    <!-- Start Modal Layout Register -->
                    <div id="modalRg" class="modal">
                        <div class="modal_overlay"></div>
                        <div class="modal_body">
                            <div class="form-general">
                                <form id="form-register" class="form" method="POST" id="form-register">
                                    <div class="form-container">
                                        <div class="form_header">
                                            <h3 class="form_heading">Đăng Ký</h3>
                                            <a id="popupLoginForm" class="form_switch-btn">Đăng Nhập</a>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" id="rg_phone" class="form_input" name="phone" placeholder="Số Điện thoại" />
                                            <span id="error-rg_phone" class="error-message"></span>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" id="rg_username" class="form_input" name="name" placeholder="Họ và tên" />
                                            <span id="error-rg_name" class="error-message"></span>
                                        </div>
                                        <div class="form_group">
                                            <input type="text" id="rg_address" class="form_input" name="address" placeholder="Địa chỉ" />
                                            <span id="error-rg_address" class="error-message"></span>
                                        </div>
                                        <div class="form_group">
                                            <input type="password" id="rg_password" class="form_input" name="password" placeholder="Mật Khẩu" />
                                            <span id="error-rg_password" class="error-message"></span>
                                        </div>
                                        <div class="form_group">
                                            <input type="password" class="form_input" name="repassword" id="rg_repassword" placeholder="Nhập lại Mật Khẩu" />
                                            <span id="error-rg_repassword" class="error-message"></span>
                                        </div>
                                        <div class="form_policy">
                                            <span>
                                                Bằng cách ấn vào nút “ĐĂNG KÝ”, tôi đồng ý với
                                                <a href="" class="policy-link"> Điều Khoản Sử Dụng </a>và
                                                <a href="" class="policy-link">Chính Sách Bảo Mật của chúng tôi</a></span>
                                        </div>
                                        <div class="form_control">
                                            <button type="button" id="rgclose" class="close button form_control-back button-normal">Trở Lại</button>
                                            <input type="submit" name="submit" class="button button_general lg_submit" value="Đăng Ký" onclick="return validateRg();">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Register Modal Layout -->
                    <!-- End Modal Layout -->
                  </ul>
              </nav>

                <!-- Search -->
                <div class="header-of-search">
                    <a href="{{ route('home') }}" style="text-decoration: none">
                      <div class="header_logo">
                          <img class="logo_img" src="{{ asset('assets/uploads/web_logo.png') }}" alt="logo">
                          <span class="store-name">HNStore</span>
                      </div>
                    </a>
                    <div class="header_search">
                        <form action="#" class="header_search" method="GET">
                            <input type="text" name="search" 
                            value="" class="header_search-input" placeholder="Tìm kiếm...">
                            <button class="header_search-btn">
                                <i class="fas fa-search header_search-icon"></i>
                            </button>
                        </form>

                    </div>

                    <!-- Shopping Cart -->
                    <div class="header_cart">
                      <a href="./cart.php" class="icon-of-cart">
                          <i class="header_cart-icon fas fa-shopping-cart"></i>
                          <span class="icon-of-cart-notice">0</span>
                      </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom">
            <div class="grid">
                <nav class="header_menu py-2 border-bottom sticky-top">
                    <ul class="header_menu-list nav nav-pills nav-fill justify-content-around justify-content-lg-around">
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
                            <a href="#" class="header_menu-item-link">Oppo</a>
                        </li>
                        <li class="header_menu-item">
                            <a href="#" class="header_menu-item-link">Xiaomi</a>
                        </li>
                        <li class="header_menu-item">
                            <a href="#" class="header_menu-item-link">Realme</a>
                        </li>
                    </ul>
                </nav>
                {{-- <nav class="py-2 bg-light border-bottom sticky-top">
                  <div class="container">
                    <ul class="nav nav-pills nav-fill justify-content-around justify-content-lg-around">
                      <li class="nav-item"><a href="#" class="nav-link link-dark px-2 active" aria-current="page">Trang chủ</a></li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Danh mục
                        </a>
                        <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Giới thiệu</a></li>
                      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Liên hệ</a></li>
                      <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Giỏ hàng</a></li>
                    </ul>
                  </div>
                </nav> --}}
            </div>
        </div>
    {{-- </header> --}}
    <!-- =============== SCRIPT =============== -->
    <script src="./asset/jquery/jquery.js"></script>
    <script src="./asset/jquery/main.js"></script>
    <script>
        // // Ajax
        // // Login
        // $("#form-login").submit(function(event) {
        //     event.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         url: "./process.php?login",
        //         data: $(this).serializeArray(),
        //         success: function(response) {
        //             response = JSON.parse(response);
        //             if (response.status == "0") {
        //                 alert(response.message);
        //                 console.log(response.message);
        //             } else {
        //                 alert(response.message);
        //                 location.reload();
        //             }
        //         }
        //     });
        // });
        // // Register
        // $("#form-register").submit(function(event) {
        //     event.preventDefault();
        //     $.ajax({
        //         type: "POST",
        //         url: "./process.php?register",
        //         data: $(this).serializeArray(),
        //         success: function(response) {
        //             response = JSON.parse(response);
        //             if (response.status == "0") {
        //                 alert(response.message);
        //                 console.log(response.message);
        //             } else {
        //                 alert(response.message);
        //                 location.reload();
        //             }
        //         }
        //     });
        // });


        // Validate
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


        // function getElement(id) {
        //     return document.getElementById(id).value.trim();
        // }

        // function validateRg() {
        //     var phone = getElement("rg_phone");
        //     var name = getElement("rg_username");
        //     var address = getElement("rg_address");
        //     var password = getElement("rg_password");
        //     var repassword = getElement("rg_repassword");

        //     var flag = true;

        //     if (phone != "") {
        //         if (!/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(phone)) {
        //             flag = false;
        //             message = "Vui lòng kiểm tra lại số điện thoại của bạn";
        //             showErr("rg_phone", message);
        //         } else {
        //             showErr("rg_phone", "");
        //         }
        //     } else {
        //         flag = false;
        //         message = "Vui lòng nhập vào số điện thoại của bạn";
        //         showErr("rg_phone", message);
        //     }

        //     if (name != "") {
        //         if (!/[a-zA-Z0-9]/.test(name)) {
        //             flag = false;
        //             message = "Vui lòng nhập vào họ tên của bạn";
        //             showErr("rg_name", message);
        //         } else {
        //             showErr("rg_name", "");
        //         }
        //     } else {
        //         flag = false;
        //         message = "Vui lòng nhập vào họ tên của bạn";
        //         showErr("rg_name", message);
        //     }

        //     if (address == "") {
        //         flag = false;
        //         message = "Vui lòng nhập vào địa chỉ của bạn";
        //         showErr("rg_address", message);
        //     } else {
        //         showErr("rg_address", "");
        //     }

        //     if (password == "") {
        //         flag = false;
        //         message = "Vui lòng nhập vào mật khẩu của bạn";
        //         showErr("rg_password", message);
        //     } else {
        //         showErr("rg_password", "");
        //     }
        //     if (repassword != "") {
        //         if (repassword != password) {
        //             flag = false;
        //             message = "Vui lòng kiểm tra lại Mật khẩu nhập lại";
        //             showErr("rg_repassword", message);
        //         } else {
        //             showErr("rg_repassword", "");
        //         }
        //     } else {
        //         flag = false;
        //         message = "Trường này không được để trống";
        //         showErr("rg_repassword", message);
        //     }
        //     return flag;
        // }
        // // Validate Login Form
        // function validateLg() {
        //     var phone = getElement("lg_phone");
        //     var password = getElement("lg_password");

        //     var flag = true;

        //     if (phone != "") {
        //         if (!/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(phone)) {
        //             flag = false;
        //             message = "Vui lòng kiểm tra lại số điện thoại của bạn";
        //             showErr("lg_phone", message);
        //         } else {
        //             showErr("lg_phone", "");
        //         }
        //     } else {
        //         flag = false;
        //         message = "Vui lòng nhập vào số điện thoại của bạn";
        //         showErr("lg_phone", message);
        //     }

        //     if (password == "") {
        //         flag = false;
        //         message = "Vui lòng nhập vào mật khẩu của bạn";
        //         showErr("lg_password", message);
        //     } else {
        //         showErr("lg_password", "");
        //     }
        //     return flag;
        // }
    </script>
    <!-- <script src="./asset/jquery/jquery.js"></script> -->