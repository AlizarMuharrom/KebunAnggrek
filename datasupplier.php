<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php?login_section=signin");
    exit();
}

?>

<?php
require_once("koneksi.php");
$query = "SELECT * FROM supplier";
$result = mysqli_query($koneksi, $query);

$no = 1;

if (!$result) {
    die("Kueri database gagal");
}

$dataSupplier = array();

while ($row = mysqli_fetch_assoc($result)) {
    $dataSupplier[] = $row;
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
        integrity="sha384-..." crossorigin="anonymous">

    <style>
        .tombol-tambah {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            position: relative;
            width: 130px;
            margin-left: 900px;
            position: relative;
            bottom: 50px;
        }

        .tombol-tambah:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-leaf"></i> <span>Kebun
                                Anggrek</span></a>
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
                                <li><a href="datatransaksi.php"><i class="fa fa-money"></i> Transaksi <span></span></a>
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
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="anggrek-ungu.jpeg" alt=""> Anggrek
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
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
                        window.location.href = 'login.php';
                    }
                }
            </script>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title" style="display: inline-block;">
                        <div class="title_left">
                            <h3>Data-data Supplier</h3>
                            <button class="tombol-tambah"><a href="formsupplier.php" style="color: #333;">Tambah
                                    Data</a></button>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Data Supplier </h2>
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
                                                            <th style="width: 70px;">Id Supplier</th>
                                                            <th>Nama</th>
                                                            <th style="width: 190px;">Alamat</th>
                                                            <th>No Telp</th>
                                                            <th style="width: 130px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <!-- Tambahkan formulir untuk setiap baris data dalam tabel -->
                                                    <tbody>
                                                        <?php
                                                        foreach ($dataSupplier as $row) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['id_supplier'] . "</td>";
                                                            echo "<td>" . $row['nama_supplier'] . "</td>";
                                                            echo "<td>" . $row['alamat'] . "</td>";
                                                            echo "<td>" . $row['no_telp'] . "</td>";
                                                            echo '<td>';
                                                            echo '<button id="edit_' . $no . '" type="button" name="edit" data-toggle="modal" data-target="#edit-modal" data-id="' . $row['id_supplier'] . '" class="btn btn-primary" data-id="' . $row['id_supplier'] . '">Edit</button>';
                                                            echo '<a href="delete/deletesupplier.php?id=' . $row['id_supplier'] . '&reqkarya=dell" title="Delete Supplier" class="btn btn-danger">
                                                            <span> Delete</span> </a>';
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

                            <script>
                                $(document).on('click', 'button[name="edit"]', function () {
                                    // Menggunakan metode chaining untuk mengakses elemen dan nilai teks lebih efisien
                                    var row = $(this).closest('tr');
                                    var id_supplier = $(this).data('id');
                                    var nama = row.find('td:eq(2)').text();
                                    var alamat = row.find('td:eq(3)').text();
                                    var notelp = row.find('td:eq(4)').text();

                                    // Menggunakan objek untuk menyimpan data dan memperjelas kodenya
                                    var supplierData = {
                                        id_supplier: id_supplier,
                                        nama: nama,
                                        alamat: alamat,
                                        notelp: notelp
                                    };

                                    // Mengisi nilai input form dengan data supplier yang dipilih
                                    $('#id_supplier').val(supplierData.id_supplier);
                                    $('#nama').val(supplierData.nama);
                                    $('#alamat').val(supplierData.alamat);
                                    $('#notelp').val(supplierData.notelp);
                                });

                            </script>

                            <script>
                                function deleteData(id_supplier) {
                                    console.log('Menghapus id_supplier: ' + id);
                                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'delete/deletesupplier.php',
                                            data: { delete: 1, delete_id: id },
                                            success: function (response) {
                                                location.reload();
                                                alert('Data Supplier berhasil dihapus.');
                                            },
                                            error: function () {
                                                alert('Gagal menghapus data Supplier.');
                                            }
                                        });
                                    }
                                }
                            </script>

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
                <form action="update/updatesupplier.php" method="post" id="insert_form" enctype='multipart/form-data'>

                    <label>Id Supplier</label>
                    <input type="text" name="id_supplier" id="id_supplier" class="form-control" readonly />
                    <br />
                    <label>Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" />
                    <br />
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                    <br />
                    <label>No Telp</label>
                    <input type="text" name="notelp" id="notelp" class="form-control">
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