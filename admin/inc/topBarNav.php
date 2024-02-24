<style>
  <?php include 'css/style.css'; ?><?php include 'css/bootstrap.min.css'; ?>#button_row {
    flex-wrap: wrap;

  }
  #button_row {
    padding: 0px;
  }
  #button_row button {
    margin-right: 5px;
    margin-left: 5px;
    margin-bottom: 5px;
    padding: 0px;
    font-weight: bold;
  }

  .nav-link {
    padding: 0px;
  }
  #profile{
    margin-bottom: 15px;
  }
</style>

<body>

  <header id="header" class="header  ">
    <!-- <div class="logo d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
          <path d="M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z"></path>
          <path d="M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6l16 .011V18z"></path>
          <path d="M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z"></path>
        </svg>
        <a href=""><span class="d-none d-lg-block">ICGS</span></a>
      </div>
    </div> -->
    <nav class="header-nav ms-auto" id="profile">
      <ul class="d-flex align-items-center">



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="User Image">
            <span class="ml-3"><?php echo ucwords($_settings->userdata('firstname') . ' ' . $_settings->userdata('lastname')) ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1)">
              <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
            </svg>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo ucwords($_settings->userdata('firstname')) ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item" href="<?php echo base_url . 'admin/?page=user' ?>"><span class="fa fa-user"></span> My Account</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item" href="<?php echo base_url . '/classes/Login.php?f=logout' ?>"><span class="fas fa-sign-out-alt"></span>
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

    <!-- BUTTONS NAVIGATION -->
    <div class="container-fluid d-flex  justify-content-left" id="button_row">
      <button type="button" class="btn btn-info">
        <a href="./" class="nav-link collapsed">
          <span>HOME</span>
        </a></button>

      <?php if ($_settings->userdata('type') == 1  &&  $_settings->userdata('usertype') == 'school') : ?>
        <button type="button" class="btn btn-info">
          <a href="<?php echo base_url ?>admin/?page=school/upload_data" class="nav-link collapsed">
            UPLOAD STUDENT DATA
          </a>
        </button>
        
        <button type="button" class="btn btn-info">
          <a href="<?php echo base_url ?>admin/?page=school/classes_list" class="nav-link collapsed">
                CLASSES LIST
          </a>
        </button>

      <?php endif; ?>
      
      <?php if ($_settings->userdata('type') == 1  &&  $_settings->userdata('usertype') == 'admin') : ?>
        <button type="button" class="btn btn-info">
          <a href="<?php echo base_url ?>admin/?page=school/classes_list_admin" class="nav-link collapsed">
            <span>GENERATE ID CARD</span>
          </a>
        </button>

        <button type="button" class="btn btn-info">
          <a href="<?php echo base_url ?>admin/?page=generate/list" class="nav-link collapsed">
            <span>GENERATE ID LIST</span>
          </a>
        </button>

        <button type="button" class="btn btn-info">
          <a href="<?php echo base_url ?>admin/?page=add-school" class="nav-link collapsed">
            <span>ADD SCHOOL USER</span>
          </a>
        </button>
      <?php endif; ?>

      <?php if ($_settings->userdata('type') == 1   &&  $_settings->userdata('usertype') == 'admin') : ?>
        <button type="button" class="btn btn-info">
          <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link collapsed  ">
            <span>SETTINGS</span>
          </a>
        </button>

      <?php endif; ?>
    </div>

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->



  </header><!-- End Header -->
  <script>
    <?php include 'js/bootstrap.bundle.js'; ?>

    function toggleSidebar() {
      let test = document.getElementById('sidebar');
      if (test.style.left === '0px' || test.style.left === '') {
        test.style.left = '-300px';
      } else test.style.left = '0px';
    }
  </script>
</body>