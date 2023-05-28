<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="menu-icon"><span class="iconify" data-icon="akar-icons:dashboard"></span></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/orders') }}">
          <i class="menu-icon"><span class="iconify" data-icon="fluent-mdl2:product"></span></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#category"
           aria-expanded="{{ Request::is('admin/category*') ? 'true':'false' }}">
          <i class="menu-icon"><span class="iconify" data-icon="vaadin:lines"></span></i>
          <span class="menu-title">Categories</span>
          <i class="menu-icon"><span class="iconify" data-icon="mingcute:down-line"></span></i>
        </a>

        {{-- TODO: fix products and category active links --}}
        <div class="collapse {{ Request::is('admin/category*') ? 'show':'' }}" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}"
               href="{{ url('admin/category/create') }}">Add Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}"
                href="{{ url('admin/category') }}">View Categories</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#products"
          aria-expanded="{{ Request::is('admin/products*') ? 'true':'false' }}">    
          <i class="menu-icon"><span class="iconify" data-icon="vaadin:lines"></span></i>
          <span class="menu-title">Products</span>
          <i class="menu-icon"><span class="iconify" data-icon="mingcute:down-line"></span></i>
        </a>

        <div class="collapse {{ Request::is('admin/products*') ? 'show':'' }}" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}"
                href="{{ url('admin/products/create') }}">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}"
                href="{{ url('admin/products') }}">View Products</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/brands') }}">
          <i class="menu-icon"><span class="iconify" data-icon="vaadin:lines"></span></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/colors') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/colors') }}">
          <i class="menu-icon"><span class="iconify" data-icon="vaadin:lines"></span></i>
          <span class="menu-title">Colors</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#user"
          aria-expanded="{{ Request::is('admin/users*') ? 'true':'false' }}">
          <i class="menu-icon"><span class="iconify" data-icon="uil:user"></span></i>
          <span class="menu-title">Users</span>
          <i class="menu-icon"><span class="iconify" data-icon="mingcute:down-line"></span></i>
        </a>

        <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}">View Users</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
          <i class="menu-icon"><span class="iconify" data-icon="ph:slideshow-light"></span></i>
          <span class="menu-title">Home Slider</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/settings') }}">
          <i class="menu-icon"><span class="iconify" data-icon="simple-line-icons:settings"></span></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
    </ul>
  </nav>