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
  {{--
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
                    <input type="text" id="lg_phone" class="form_input" name="phone" placeholder="Số Điện thoại" />
                    <span id="error-lg_phone" class="error-message"></span>
                  </div>
                  <div class="form_group">
                    <input type="password" id="lg_password" class="form_input" name="password" placeholder="Mật Khẩu" />
                    <span id="error-lg_password" class="error-message"></span>
                  </div>
                  <div class="form_control">
                    <button type="button" class="close button form_control-back button-normal"
                      data-bs-dismiss="modal">Trở Lại</button>
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
      exampleModal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="defaultForm-email" class="form-control validate">
              <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
            </div>

            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="defaultForm-pass" class="form-control validate">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-default">Login</button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="mt-5">
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  --}}
  <div class="container">
    <h4 class="text-danger mt-2">ABCShop xin chào Nam!</h4>
    <p>Đơn hàng mã <strong>921</strong> của bạn đã được xác nhận và sẽ giao tới bạn vào ngày <strong>22-4-2022</strong>.
    </p>
    <h5 class="mt-3">Thông tin đơn hàng</h5>
    <hr class="mb-2">
    <div class="order-info">
      <p>Người nhận: <strong>Hoàng Nam</strong></p>
      <p>Địa chỉ nhận hàng: <strong>Mậu Thân, Ninh Kiều, Cần Thơ</strong></p>
      <p>Số điện thoại: <strong>0987654321</strong></p>
      <p>Email: <strong>hoangnam1114ad@gmail.com</strong></p>
    </div>
    <hr class="mb-3">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Đơn giá</th>
          <th>Số lượng mua</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Iphone 11</td>
          <td>17.000.000 VNĐ</td>
          <td>1</td>
          <td>17.000.000 VNĐ</td>
        </tr>
        <tr>
          <td>Samsung Note 20 Ultra</td>
          <td>23.000.000 VNĐ</td>
          <td>1</td>
          <td>23.000.000 VNĐ</td>
        </tr>
        <tr>
          <td colspan="3"><strong>Tổng cộng:</strong></td>
          <td><strong>40.000.000 VNĐ</strong></td>
        </tr>
      </tbody>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
</body>

</html>