<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="mr-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-general">
                            <form id="form-login" class="form" method="POST" role="form">
                              <div class="form-container">
                                <div class="form_header">
                                  <h3 class="form_heading">Đăng Nhập</h3>
                                  <a id="popupRegisterForm" class="form_switch-btn">Đăng Ký</a>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-general">
                            <form id="form-register" class="form" method="POST" id="form-register">
                              <div class="form-container">
                                <div class="form_header">
                                  <h3 class="form_heading">Đăng Ký</h3>
                                  <a id="popupLoginForm" class="form_switch-btn">Đăng Nhập</a>
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
                                    class="close button form_control-back button-normal">Trở Lại</button>
                                  <input type="submit" name="submit" class="button button_general lg_submit"
                                    value="Đăng Ký" />
                                </div>
                              </div>
                            </form>
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>