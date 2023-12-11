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
                                <li><a href="datapelanggan.php"><i class="fa fa-user"></i> Pelanggan <span></span></a>
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
                            <h3>Laporan Bulanan</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Data Laporan </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <form role="form" action="" method="GET" id="bulanForm">
                                    <div class="input-group">
                                        <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" tabindex="-1" aria-hidden="false" name="bln"
                                            id="id_pinjaman">
                                            <option selected="selected" value="" disabled>-Pilih-</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </form>

                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        $('#id_pinjaman').on('change', function () {
                                            $('#bulanForm').submit(); // submit form saat pilihan berubah
                                        });
                                    });
                                </script>

                                <?php
                                $selectedMonth = "";
                                if ($_SERVER["REQUEST_METHOD"] == "GET") {

                                    if (isset($_GET["bln"])) {
                                        $selectedMonth = $_GET["bln"];

                                        $monthNames = [
                                            "01" => "Januari",
                                            "02" => "Februari",
                                            "03" => "Maret",
                                            "04" => "April",
                                            "05" => "Mei",
                                            "06" => "Juni",
                                            "07" => "Juli",
                                            "08" => "Agustus",
                                            "09" => "September",
                                            "10" => "Oktober",
                                            "11" => "November",
                                            "12" => "Desember"
                                        ];

                                        echo "<h3 class='center'>Bulan : " . $monthNames[$selectedMonth] . "</h3>";
                                    }
                                }
                                ?>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box table-responsive">
                                                <table id="datatable" class="table table-striped table-bordered"
                                                    style="width:100%; ">
                                                    <thead>
                                                        <tr>
                                                            <th>Id Penjualan</th>
                                                            <th>Nama Anggrek</th>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Tanggal</th>
                                                            <th>Jumlah</th>
                                                            <th>Total Harga</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Koneksi ke database
                                                        require_once("koneksi.php");
                                                        if ($koneksi->connect_error) {
                                                            die("Koneksi gagal: " . $koneksi->connect_error);
                                                        }
                                                        $query = "
                                    SELECT
                                    penjualan.id_penjualan,
                                    penjualan.tanggal_penjualan,
                                    penjualan.jumlah_item,
                                    penjualan.total_harga,
                                    anggrek.nama_anggrek,
                                    pelanggan.nama_pelanggan
                                FROM
                                    penjualan
                                JOIN
                                    detail_penjualan ON penjualan.id_penjualan = detail_penjualan.id_penjualan
                                JOIN
                                    anggrek ON anggrek.id_anggrek = detail_penjualan.id_anggrek
                                JOIN
                                    pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan
                                    WHERE
                                    MONTH(penjualan.tanggal_penjualan) = '$selectedMonth';";
                                                        $result = $koneksi->query($query);
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row['id_penjualan'] . "</td>";
                                                            echo "<td>" . $row['nama_anggrek'] . "</td>";
                                                            echo "<td>" . $row['nama_pelanggan'] . "</td>";
                                                            echo "<td>" . $row['tanggal_penjualan'] . "</td>";
                                                            echo "<td>" . $row['jumlah_item'] . "</td>";
                                                            echo "<td>" . $row['total_harga'] . "</td>";
                                                            echo '<td>
    <center><a href="laporancetak.php?id_penjualan=' . $row['id_penjualan'] . '" title="Edit Data ini" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a></center>
</td>';
                                                            echo '</td>';
                                                            echo "</tr>";
                                                        }
                                                        // $koneksi->close();
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_GET['bln'])) {
                                        ?>
                                        <center style="margin-left: 875px; margin-top: 15px;">
                                            <a href="cetaksemua.php?bln=<?php echo $_GET['bln'] ?>" title="Edit Data ini"
                                                class="btn btn-info btn-sm" style="margin-left: 200px;">
                                                <i class="fa fa-print"></i> Print All
                                            </a>
                                        </center>
                                        <?php
                                    } else {
                                        // Lakukan sesuatu jika $_GET['bln'] belum diatur
                                        // Contoh: Tampilkan pesan bahwa bulan belum dipilih
                                        echo "";
                                    }
                                    ?>

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