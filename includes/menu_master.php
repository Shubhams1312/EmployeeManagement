<style>
  .cont-col2 {
    margin-top: 7px;
    font-size: 12px;
  }

  .btn_side {
    padding: 10px 20px;
  }

  .bt {
    background: transparent;
    border: none;
    width: 30px;
    height: 30px;
    cursor: pointer;
    outline: 0;
  }

  .toggle span {
    width: 100%;
    height: 3px;
    background: #555;
    display: block;
    position: relative;
    coursor: pointer;
  }

  .toggle span:before,
  .toggle span:after {
    content: '';
    position: absolute;
    left: 0;
    width: 100%;
    height: 100%;
    background: #555;
    transition: all 0.3s ease-out;
  }

  .toggle span:before {
    top: -8px;
  }

  .toggle span:after {
    top: 8px;
  }

  .toggle span.toggle {
    background: transparent;
  }

  .toggle span.toggle:before {
    top: 0;
    transform: rotate(-45deg);
    background: #ff8c1a;
  }

  .toggle span.toggle:after {
    top: 0;
    transform: rotate(45deg);
    background: #ff8c1a;
  }

  .sidebar {
    background: #fff;
    width: 235px;
    position: fixed;
    top: 0;
    left: -235px;
    height: 100%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    padding-top: 90px;
    transition: all 0.3s ease-out;
  }

  .sidebar ul {
    list-style: none;
  }

  .sidebar ul li {
    display: block;
  }

  .sidebar ul li a {
    padding: 8px 15px;
    font-size: 16px;
    color: #222;
    font-family: arial;
    text-decoration: none;
    display: block;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease-out;
    font-weight: 500;
  }

  .sidebar ul li a:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    right: 50%;
    transform: translate(-50%, -50%);
    width: 0;
    height: 1px;
    background: #ff8c1a;
    z-index: -1;
    transition: all 0.3s ease-out;
  }

  .sidebar ul li a:hover:before {
    width: 100%;
  }

  .sidebar ul li a:hover {
    color: #ff8c1a;
  }

  .sidebarshow {
    left: 0;
  }

  .side_bar-logo {
    padding-left: 23%;
    margin-top: -31%;
  }

  .logo-default {
    display: block;
    /* make the image a block element */
    margin: 0 auto;
    /* center the image horizontally */
  }

  .dropdown-content {
    display: none;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .menu {
    background: white;
    backdrop-filter: blur(15px);
    height: 100vh;
    top: 0;
    left: -250px;
    overflow-y: auto;
    transition: 0.6s ease;
    transition-property: left;
  }

  .menu .item a {
    color: black;
    font-size: 14px;
    text-decoration: none;
    display: block;
    padding: 0px 52px;
    line-height: 60px;
  }

  .menu .item a:hover {
    background: #E1E1E1;
    transition: 0.3s ease;
  }

  .menu .item a .dropdown {
    position: absolute;
    right: 0;
    margin: 20px;
    transition: 0.3s ease;
  }

  .menu .item .sub-menu {

    display: none;
  }

  .menu .item .sub-menu a {
    padding-left: 50px;
    font-size: 12px;
  }

  .rotate {
    transform: rotate(90deg);
  }

  .menu-btn {
    position: absolute;
    color: rgb(0, 0, 0);
    font-size: 35px;
    margin: 25px;
    cursor: pointer;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="page-header navbar navbar-fixed-top">
  <div class="page-header-inner ">

    <div class="page-logo">
      <img src="../images/kanalytics.png" alt="logo" class="logo_default" width="117" height="30" style="margin: 10px 0 0;" />
    </div>
    <!-- BEGIN MEGA MENU -->
    <div class="hor-menu   hidden-sm hidden-xs">
      <ul class="nav navbar-nav">
        <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
        <li class="classic-menu-dropdown " aria-haspopup="true">
          <div class="btn_side">
            <button type="button" class="toggle bt" id="toggle">
              <span></span>
            </button>
            <div class="sidebar" id='sidebar'>
              <div class="side_bar-logo">
                <a href="home_page.php">
                  <img src="../images/kanalytics.png" alt="logo" class="logo-default" width="117" height="30" style="margin: 10px 0 0;" /> </a>
              </div>

              <div class="menu">
                <div class="item"><a href="\hr_management\master_data.php"><i class="fas fa-desktop"></i>Dashboard</a></div>
                <div class="item">
                  <a class="sub-btn"><i class="fas fa-table"></i>Add Master<i class="fas fa-angle-right dropdown"></i></a>
                  <div class="sub-menu">
                    <a href="\hr_management\master\bank_master.php" class="sub-item">Add County</a>
                    <a href="\hr_management\master\department_master.php" class="sub-item">Add Department</a>
                    <a href="\hr_management\master\designation_master.php" class="sub-item">Add Designation</a>
                    <a href="\hr_management\master\division_master.php" class="sub-item">Add Division</a>
                    <a href="\hr_management\master\bank_master.php" class="sub-item">Add Bank</a>
                    <a href="\hr_management\master\grade_master.php" class="sub-item">Add Grade</a>
                    <a href="\hr_management\master\reporting_master.php" class="sub-item">Add Reporting</a>
                    <a href="\hr_management\master\state_master.php" class="sub-item">Add State</a>
                    <a href="\hr_management\master\branch_master.php" class="sub-item">Add Branch</a>
                  </div>
                </div>
                <div class="item">
                  <a class="sub-btn"><i class="fas fa-cogs"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>
                  <div class="sub-menu">
                    <a href="#" class="sub-item">Sub Item 01</a>
                    <a href="#" class="sub-item">Sub Item 02</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>


    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
      <span></span>
    </a>
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle" src="./assets/layouts/layout/img/logo1.png" />
            <span class="username username-hide-on-mobile"> </span>
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-default">
            <li>
              <a href="logout.php">
                <i class="icon-key"></i> Log Out </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

</div>



<script type="text/javascript">
  var btn = document.querySelector('.toggle');
  var btnst = true;
  btn.onclick = function() {
    if (btnst == true) {
      document.querySelector('.toggle span').classList.add('toggle');
      document.getElementById('sidebar').classList.add('sidebarshow');
      btnst = false;
    } else if (btnst == false) {
      document.querySelector('.toggle span').classList.remove('toggle');
      document.getElementById('sidebar').classList.remove('sidebarshow');
      btnst = true;
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //jquery for toggle sub menus
    $('.sub-btn').click(function() {
      $(this).next('.sub-menu').slideToggle();
      $(this).find('.dropdown').toggleClass('rotate');
    });

    //jquery for expand and collapse the sidebar
    $('.menu-btn').click(function() {
      $('.side-bar').addClass('active');
      $('.menu-btn').css("visibility", "hidden");
    });

    $('.close-btn').click(function() {
      $('.side-bar').removeClass('active');
      $('.menu-btn').css("visibility", "visible");
    });
  });
</script>

</div>
</div>
</div>
<!-- END QUICK SIDEBAR -->