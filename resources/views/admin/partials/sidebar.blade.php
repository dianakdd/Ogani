<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a class="nav-link" href="../../index.html">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="icon-bg"><i class="mdi mdi-table-large menu-icon"></i></span>
          <span class="menu-title">Add Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">Produk</a></li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item sidebar-user-actions">
        <div class="user-details">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="d-flex align-items-center">
                <div class="sidebar-profile-img">
                  <img src="{{ asset('/img/profile/face28.png')}}" alt="image">
                </div>
                <div class="sidebar-profile-text">
                  <p class="mb-1">
                    @yield('namauser')
                  </p>
                </div>
              </div>
            </div>
            <div class="badge badge-danger">3</div>
          </div>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
          </a>
        </div>
      </li>
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span></a>
        </div>
      </li>
    </ul>
  </nav>