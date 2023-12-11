<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php?login_section=signin");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Kebun Anggrek</title>

  <!-- Bootstrap -->
  <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ez5FJ02OnTTOHCOmJ5rYkkMjz5m9f88EFLCZ/1cNJZpIuZf4qflRBFCyWQGQbHcc" crossorigin="anonymous">
  <!-- Custom Theme Style -->
  <link href="admin/build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-..." crossorigin="anonymous">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-leaf"></i> <span>Kebun Anggrek</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="anggrek-ungu.jpeg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Users!!</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->

          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Home <span></span></a>
                                </li>

                                <li><a href="DataAnggrek.php"><i class="fa fa-leaf"></i> Anggrek <span></span></a>
                                </li>
                                <li><a href="datasupplier.php"><i class="fa fa-truck"></i> Supplier <span></span></a>

                                </li>
                                <li><a href="datapelanggan.php"><i class="fa fa-user"></i> Pelanggan <span"></span></a>

                                </li>
                                <li><a href="datatransaksi.php"><i class="fa fa-money"></i> Transaksi <spaan></span></a>
                                </li>
                                <li><a href="laporan.php"><i class="fa fa-book"></i> Laporan <span></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->

          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class="navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="anggrek-ungu.jpeg" alt=""> Anggrek
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:void(0);" onclick="logoutConfirmation();">
                    <i class="fa fa-sign-out pull-right"></i> Log Out
                  </a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <script>
        function logoutConfirmation() {
          if (confirm('Apakah Anda yakin ingin Logout?')) {
            window.location.href = 'logout.php';
          }
        }
      </script>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

              <div class="row x_title">
                <div class="col-md-6">
                  <h3>Aktifitas Penjualan</h3>
                </div>
                <!-- <div class="col-md-6">
                  <div id="reportrange" class="pull-right"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                    <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-sm-9 ">
                <div id="chart_plot_01" class="demo-placeholder"></div>
              </div>
              
              <div class="col-md-3 col-sm-3  bg-white">
                <div class="x_title">
                  <h2>Top Campaign Performance</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12 ">
                  <div>
                    <p>Facebook Campaign</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Twitter Campaign</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 ">
                  <div>
                    <p>Conventional Media</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Bill boards</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
                
              </div>
              <div class="clearfix"></div>
            </div>
            <iframe title="Report Section" width="1330" height="500" src="https://app.powerbi.com/view?r=eyJrIjoiMjZkMDRmMTMtYjFhYy00ZDNiLWI4YWMtM2RmNGYxOGViNWViIiwidCI6IjUyNjNjYzgxLTU5MTItNDJjNC1hYmMxLWQwZjFiNjY4YjUzMCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
            <!-- <iframe title="Report Section" width="1330" height="500" src="https://app.powerbi.com/view?r=eyJrIjoiZjUxNjkwMGQtZWY4MC00ZTY5LThiNDgtOTQ1Y2FmNDhkMDhhIiwidCI6IjUyNjNjYzgxLTU5MTItNDJjNC1hYmMxLWQwZjFiNjY4YjUzMCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe> -->
          </div>

        </div>
        <br />

        <div class="row">
                  <!-- end of weather widget -->
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      <a href="https://colorlib.com"></a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>

  <!-- jQuery -->
  <script src="admin/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="admin/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="admin/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="admin/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="admin/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="admin/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="admin/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="admin/vendors/Flot/jquery.flot.js"></script>
  <script src="admin/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="admin/vendors/Flot/jquery.flot.time.js"></script>
  <script src="admin/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="admin/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="admin/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="admin/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="admin/vendors/moment/min/moment.min.js"></script>
  <script src="admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="admin/build/js/custom.min.js"></script>

</body>

</html>