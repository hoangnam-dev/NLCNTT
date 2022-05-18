<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ABCShop</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
          alt="User Image">
      </div> --}}
      <div class="info">
        <a href="{{ route('admin.users.admin-edit', ['manv'=>Auth::guard('admin')->user()->manv]) }}" class="d-block">{{ Auth::guard('admin')->user()->tennv }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
{{--
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
--}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{ route('admin.dashboard') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        {{-- Oders --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            {{-- <i class="nav-icon fas fa-th"> --}}
              <i class="nav-icon fas fa-solid fa-clipboard-list"></i>
            </i>
            <p>Đơn hàng<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.orders') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Tất cả đơn hàng</p>
                </a>
                <a href="{{ route('admin.orders.status', ['status'=>0]) }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-box"></i>
                  <p>Đơn hàng mới</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.orders.status', ['status'=>1]) }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-truck-fast"></i>
                  <p>Đơn đang giao</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.orders.status', ['status'=>2]) }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-check"></i>
                  <p>Đơn hoàn thành</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- Products --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas  fa-solid fa-mobile-screen"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.products') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.products.product-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm sản phẩm</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.comments') }}" class="nav-link">
                  <i class="nav-icon fas fa-thin fa-star"></i>
                  <p>Danh sách đánh giá</p>
                </a>
            </li>
            
          </ul>
        </li>

        {{-- Categories --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-table-list"></i>
            <p>
              Danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.categories') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách danh mục</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.categories.category-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm danh mục</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- News --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-newspaper"></i>
            <p>Tin tức
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.news') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách tin tức</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.news.news-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm tin tức</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- Product Attributies --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-thin fa-gears"></i>
            <p>Thuộc tính sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.attributes') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách thuộc tính</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.attributes.attribute-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm thuộc tính</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- Sliders --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-sliders"></i>
            <p>Sliders
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.sliders') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách slider</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.sliders.slider-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm slider</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- Promotions --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            {{-- <i class="nav-icon fas fa-th"></i> --}}
            <i class="nav-icon fas fa fa-tags" aria-hidden="true"></i>
            <p>Khuyến mãi<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.promotions') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách khuyến mãi</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.promotions.promotion-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm khuyến mãi</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- Customers --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            {{-- <i class="nav-icon fas fa fa-people"></i> --}}
            <i class="nav-icon fas fa-solid fa-users"></i>
            <p>Khách hàng<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.customers') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách khách hàng</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.customers.customer-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm khách hàng</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- User Admin --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-thin fa-user"></i>
            <p>Nhân viên <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.users') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách nhân viên</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.users.admin-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm nhân viên</p>
                </a>
            </li>
          </ul>
        </li>

        {{-- Roles --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-thin fa-user"></i>
            <p>Nhân viên <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.users') }}" class="nav-link">
                  <i class="nav-icon fas fa-light fa-list"></i>
                  <p>Danh sách nhân viên</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.users.admin-create') }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-square-pen"></i>
                  <p>Thêm nhân viên</p>
                </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>