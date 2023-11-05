<?php
require_once("koneksi.php");
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($koneksi, $query);

$no = 1;

if (!$result) {
    die("Kueri database gagal");
}

$dataPelanggan = array();

while ($row = mysqli_fetch_assoc($result)) {
    $dataPelanggan[] = $row;
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

    <title>Kebun Anggrek</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->

    <link href="admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-admin." crossorigin="anonymous">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-seedling"></i> <span>Kebun
                                Anggrek</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="anggrek-ungu.jpeg" alt="admin." class="img-circle profile_img">
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
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="index.php">Dashboard</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-leaf"></i> Anggrek <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="DataAnggrek.php">Data Anggrek </a></li>
                                        <li><a href="formanggrek.php">Tambah Data</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-truck"></i> Supplier <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="datasupplier.php">Data Supplier </a></li>
                                        <li><a href="formsupplier.php">Tambah Data</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-user"></i> Pelanggan <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="datapelanggan.php">Data Pelanggan </a></li>
                                        <li><a href="formpelanggan.php">Tambah Data</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-dollar"></i> Transaksi <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="datatransaksi.php">Data Transaksi</a></li>
                                        <li><a href="Transaksi.php">Form Transaksi</a></li>
                                    </ul>
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
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="anggrek-ungu.jpeg" alt="">Anggrek
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    </a>
                                    <a class="dropdown-item" href="#"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Data-data Pelanggan</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search foradmin.">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Data Pelanggan </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="datatable" class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>No Telp</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($dataPelanggan as $row) {
                                                            echo "<tr>";
                                                            echo "<td>" . $no . "</td>";
                                                            echo "<td>" . $row['nama_pelanggan'] . "</td>";
                                                            echo "<td>" . $row['alamat'] . "</td>";
                                                            echo "<td>" . $row['no_telp'] . "</td>";
                                                            echo '<td>';
                                                            echo '<button data-target="#edit-modal" data-toggle="modal" id="edit_' . $no . '" type="button" name="edit" class="btn btn-primary" onclick="editData(' . $no . ')">Edit</button>';
                                                            echo ' <button id="delete_' . $no . '" type="button" name="delete" class="btn btn-danger" onclick="deleteData(' . $no . ')">Delete</button>';
                                                            echo '</td>';
                                                            echo "</tr>";
                                                            $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>




                                    <!-- /page content -->

                                    <!-- footer content -->
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
                            <!-- iCheck -->
                            <script src="admin/vendors/iCheck/icheck.min.js"></script>
                            <!-- Datatables -->
                            <script src="admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                            <script src="admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                            <script src="admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                            <script src="admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                            <script src="admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                            <script src="admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                            <script src="admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                            <script
                                src="admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                            <script src="admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                            <script
                                src="admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                            <script
                                src="admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                            <script src="admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                            <script src="admin/vendors/jszip/dist/jszip.min.js"></script>
                            <script src="admin/vendors/pdfmake/build/pdfmake.min.js"></script>
                            <script src="admin/vendors/pdfmake/build/vfs_fonts.js"></script>

                            <!-- Custom Theme Scripts -->
                            <script src="admin/build/js/custom.min.js"></script>

</body>

</html>

<div id="edit-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">Form Ubah Data Anggrek</h4>
            </div>
            <div class="modal-body">
                <form action="update/updatepelanggan.php" method="post" id="insert_form" enctype='multipart/form-data'>

                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama" id="nopol" class="form-control" />
                    <br />
                    <label>Alamat</label>
                    <input type="text" name="jenis" id="merk" class="form-control" />
                    <br />
                    <label>No Telp</label>
                    <input type="text" name="harga" id="type" class="form-control">
                    <br />
                    <input type="submit" name="update" id="update" value="Update" class="btn btn-success"
                        onMouseOver="this.style.backgroundColor='#00796b'"
                        onMouseOut="this.style.backgroundColor='#4CAF50'" />
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onMouseOver="this.style.backgroundColor='#ff6666'"
                    onMouseOut="this.style.backgroundColor='white'" data-dismiss="modal">Close</button>
            </div>


        </div>
    </div>
</div>