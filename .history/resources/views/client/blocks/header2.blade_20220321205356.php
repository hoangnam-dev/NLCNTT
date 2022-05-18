<div class="header-top">
  <div class="container">
    <div class="header-top_nav">
      <!-- Nav-Left -->
      <ul class="header_navbar-list">
        <li class="header_navbar-item">
          <a class="header_navbar-item-link" href="#support" target="_self">Hổ trợ</a>
        </li>
        <li class="header_navbar-item">
          <span class="header_navbar-title-no-pointer">Theo dõi chúng tôi</span>
          <a href="https://www.facebook.com/" class="header_navbar-item-link">
            {{-- <i class="fab fa-facebook header_navbar-icon"></i> --}}
            <i class="fa-brands fa-facebook header_navbar-icon"></i>
          </a>
          <a href="https://www.instagram.com/" class="header_navbar-item-link">
            {{-- <i class="fab fa-instagram header_navbar-icon"></i> --}}
            <i class="fa-brands fa-instagram header_navbar-icon"></i>
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
          <a class="nav-link" href="{{ route('client.catergory') }}" id="navbarDropdown">
            Danh mục
          </a>
          <ul class="dropdown-content" style="width: 165px">
            @foreach ($categories as $value)
            <li><a class="dropdown-item" href="{{ route('client.productsbycatergory', ['dm_slug'=>$value->dm_slug]) }}">{{ $value->tendm }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Liên hệ</a>
        </li>
      </ul>
      {{-- <div class="d-flex justify-content-center align-items-center navbar-right"> --}}
        <form class="d-flex header-search mr-5">
          <input class="form-control me-2" type="input" placeholder="Tìm kiếm..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        {{--
      </div> --}}
    </div>
    <a href="{{ route("client.cart") }}">
      <div class="cart">
        <i class="fa-solid fa-cart-shopping"></i>
      </div>
    </a>
  </div>
</nav>