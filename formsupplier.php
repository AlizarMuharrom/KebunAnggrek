<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
	header("Location: login.php?login_section=signin");
	exit();
}

?>

<?php

// Fungsi generateID()
function generatesupplier()
{
	try {
		// Sambungkan ke database Anda
		$conn = mysqli_connect("localhost", "root", "", "anggrek");

		// Periksa koneksi
		if (mysqli_connect_errno()) {
			echo "Koneksi ke database gagal: " . mysqli_connect_error();
			exit();
		}

		// Query untuk mengambil data pelanggan dan mengurutkannya berdasarkan id_pelanggan secara ascending
		$sql = "SELECT * FROM supplier ORDER BY id_supplier ASC";
		$result = mysqli_query($conn, $sql);

		$nextNumber = 1;

		while ($row = mysqli_fetch_assoc($result)) {
			$NoJual = substr($row['id_supplier'], 3);
			if (!empty($NoJual)) {
				$nextNumber = max($nextNumber, intval($NoJual) + 1);
			}
		}

		$AN = sprintf("%04d", $nextNumber);
		$newID = "TP" . $AN;

		// Tutup koneksi ke database
		mysqli_close($conn);

		return $newID;
	} catch (Exception $e) {
		echo "Terjadi kesalahan: " . $e->getMessage();
	}
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

</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.php" class="site_title"><i class="fa fa-leaf"></i> <span>Kebun
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
					<div class="page-title">
						<div class="title_left">
							<h3>Form Supplier</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Input data Supplier</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="insert/insertsupplier.php" method="post">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="namaanggrek">No Supplier <span class="required"></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="no " required name="no" class="form-control "
													value="<?php echo generatesupplier(); ?>" readonly>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align"
												for="namasupplier">Nama Supplier<span class="required"></span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="namasupplier" name="namasupplier" required
													class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="harga"
												class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="alamat" class="form-control" type="text" name="alamat"
													required>
											</div>
										</div>

										<div class="item form-group" style="margin-top: 10px;">
											<label for="stok"
												class="col-form-label col-md-3 col-sm-3 label-align">No_Telp</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="no_telp" class="form-control" type="number" name="nomer"
													required>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php
					?>

					<!-- /page content -->

					<!-- footer content -->
					<footer>
						<div class="pull-right"><a href="https://colorlib.com"></a>
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
			<!-- bootstrap-progressbar -->
			<script src="admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
			<!-- iCheck -->
			<script src="admin/vendors/iCheck/icheck.min.js"></script>
			<!-- bootstrap-daterangepicker -->
			<script src="admin/vendors/moment/min/moment.min.js"></script>
			<script src="admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
			<!-- bootstrap-wysiwyg -->
			<script src="admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
			<script src="admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
			<script src="admin/vendors/google-code-prettify/src/prettify.js"></script>
			<!-- jQuery Tags Input -->
			<script src="admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
			<!-- Switchery -->
			<script src="admin/vendors/switchery/dist/switchery.min.js"></script>
			<!-- Select2 -->
			<script src="admin/vendors/select2/dist/js/select2.full.min.js"></script>
			<!-- Parsley -->
			<script src="admin/vendors/parsleyjs/dist/parsley.min.js"></script>
			<!-- Autosize -->
			<script src="admin/vendors/autosize/dist/autosize.min.js"></script>
			<!-- jQuery autocomplete -->
			<script src="admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
			<!-- starrr -->
			<script src="admin/vendors/starrr/dist/starrr.js"></script>
			<!-- Custom Theme Scripts -->
			<script src="admin/build/js/custom.min.js"></script>

</body>

</html>