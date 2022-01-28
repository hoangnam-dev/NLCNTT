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
      <div class="image">
        <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::guard('admin')->user()->tennv }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
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
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Đơn hàng<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn hàng mới</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn đang giao</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Đơn hoàn thành</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.products') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.products.product-create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Danh mục
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.categories') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.categories.category-create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Hãng sản xuất
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.brands') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách hãng sản xuất</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.brands.brand-create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm hãng sản xuất</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Khuyến mãi<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.promotions') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách khuyến mãi</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.promotions.promotion-create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm khuyến mãi</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Khách hàng</p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.customers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách khách hàng</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.customers.customer-create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm khách hàng</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Nhân viên</p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.users') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nhân viên</p>
                </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{ route('admin.users.admin-create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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