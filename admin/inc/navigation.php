<style>
  <?php include 'css/style.css'; ?>
</style>
<link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>


<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a href="./" class="nav-link collapsed">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <span>DASHBOARD</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <?php if ($_settings->userdata('type') == 1  &&  $_settings->userdata('usertype') == 'school') : ?>

      <li class="nav-item ">
        <a href="<?php echo base_url ?>admin/?page=school/upload_data" class="nav-link collapsed">
          <i class="nav-icon fas fa-th-list"></i>
          Upload Student Data
        </a>
      </li>

      <li class="nav-item ">
        <a href="<?php echo base_url ?>admin/?page=school/classes_list" class="nav-link collapsed">
          <i class="nav-icon fas fa-th-list"></i>
          Classes List
        </a>
      </li>
    <?php endif; ?>

    <?php if ($_settings->userdata('type') == 1  &&  $_settings->userdata('usertype') == 'admin') : ?>
      <li class="nav-item">
        <!-- <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"> -->
        <a href="<?php echo base_url ?>admin/?page=generate" class="nav-link collapsed">
          <i class="nav-icon fas fa-id-card-alt"></i>
          <span>GENERATE ID </span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <!-- <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"> -->
        <a href="<?php echo base_url ?>admin/?page=generate/list" class="nav-link collapsed">
          <i class="nav-icon fas fa-th-list"></i>
          <span>GENERATE ID LIST</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a href="<?php echo base_url ?>admin/?page=templates" class="nav-link collapsed">
          <i class="nav-icon fas fa-id-card"></i>
          <span>ID TEMPLATES</span>
        </a>
      </li><!-- End Tables Nav -->
    <?php endif; ?>
    <?php if ($_settings->userdata('type') == 1   &&  $_settings->userdata('usertype') == 'admin') : ?>
      <li class="nav-item">
        <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link collapsed  ">
          <i class="nav-icon fas fa-cogs"></i>
          </i><span>SETTINGS</span>
        </a>
      </li><!-- End Charts Nav -->
    <?php endif; ?>


  </ul>

</aside><!-- End Sidebar-->


<script>
  $(document).ready(function() {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    page = page.split('/');
    page = page.join('_');

    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')
      }

    }

  })
</script>