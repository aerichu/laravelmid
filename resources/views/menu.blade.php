<body>
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <div class="search-field d-none d-md-block">
            
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="" id="profileDropdown">
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">Welcome <?=session()->get('username')?>!</p>
                </div>
              </a>
            </li>
           
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="http://localhost:8080/home/logout">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2" style="margin-left: -60px;"><?=session()->get('username')?></span>
                  <span class="text-secondary text-small" style="margin-left: -60px;"><?=session()->get('level')?></span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8000/Controller/user">
                <span class="menu-title">User</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
              </a>
            </li>
           
            </li>
          </ul>
        </nav>