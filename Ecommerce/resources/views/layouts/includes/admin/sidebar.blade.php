 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-sale menu-icon"></i>
          <span class="menu-title">Sales</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category')}}">View Category</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category/create')}}">Add Category</a></li>
            
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-square-inc-cash menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="products">
          <ul class="nav flex-column sub-menu">  
            <li class="nav-item"><a class="nav-link" href="{{url('/admin/products')}}">View Products</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/admin/products/create')}}">Add Products </a></li>   
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/brands">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/color')}}">
          <i class="mdi mdi-format-paint menu-icon"></i>
          <span class="menu-title">Colors</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-account-multiple menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-cards menu-icon"></i>
          <span class="menu-title">Home Slider</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
        {{-- <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div> --}}
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Site Settings</span>
        </a>
      </li>
    </ul>
  </nav>
  