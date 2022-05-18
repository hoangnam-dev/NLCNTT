<div class="header-top">
  <div class="container">
    <div class="header-top_nav">
      <!-- Nav-Left -->
      <ul class="header_navbar-list">
        <li class="header_navbar-item">
          <a class="header_navbar-item-link" href="#support" target="_self">Hổ trợ kỹ thuật</a>
        </li>
        <li class="header_navbar-item">
          <span class="">0123 456 789</span>
        </li>
      </ul>
      <!-- Nav-Right -->
      <ul class="header_navbar-list">
        <!-- Has Login -->
        @if (Auth::check())
        <li class="header_navbar-item header_navbar-user">
          <img src="{{ asset('assets/client/images/img-user.jpg') }}" alt="user-img" class="user-img">
          <span id="user" class="header_navbar-username">{{ Auth::user()->tenkh }}</span>
          <ul class="user_menu">
            <li class="user_menu-item">
              <a href="{{ route('client.user.profile') }}">Quản lý tài khoản</a>
            </li>
            <li class="user_menu-item">
              <a href="{{ route('client.user.order') }}">Đơn hàng</a>
            </li>
            <li class="user_menu-item user_menu-item-separate">
              <a href="{{ route('client.user.logout') }}">Đăng xuất</a>
            </li>
          </ul>
        </li>
        @else
        <!-- Hasn't Login -->
        <li class="header_navbar-item header_navbar-item-separate">
          <a class="btn-modal header_navbar-item-link header_navbar-item-strong" href="{{ route('client.user.login') }}">Đăng
            nhập</a>
        </li>
        <li class="header_navbar-item">
          <a class="btn-modal header_navbar-item-link header_navbar-item-strong"
            href="{{ route('client.user.register') }}">Đăng
            ký</a>
        </li>
        <!--  Start LogiModal Layout -->
        @endif
      </ul>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #cdc438;">
  <div class="container">
    <a class="navbar-brand" href="{{ route('client.home') }}">
      <img class="navbar-logo" src="{{ asset('assets/uploads/web_logo.png') }}" alt="">
      ABCShop
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('client.home') }}">Trang chủ</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('client.category') }}" id="navbarDropdown">
            Danh mục
          </a>
          <ul class="dropdown-content" style="width: 165px">
            @foreach ($categories as $value)
            <li><a class="dropdown-item" href="{{ route('client.productsbycategory', ['danh_muc'=>$value->madm]) }}">{{ $value->tendm }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.news') }}">Tin tức</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('client.policy') }}">Chính sách bảo mật</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Liên hệ</a>
        </li> --}}
      </ul>
        <form class="d-flex header-search mr-5" action="{{ route('client.search') }}" method="GET">
          @csrf

          <input class="form-control me-2" type="input" name="search_key" placeholder="Tìm kiếm..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <a href="{{ route("client.cart") }}">
      <div class="cart">
        <i class="fa-solid fa-cart-shopping"></i>
        <div class="total_item">{{ $total_item }}</div>
      </div>
    </a>
  </div>
</nav>