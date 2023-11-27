<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location: login.php?login_section=signin");
  exit();
}

?>

<?php
// Fungsi generateID()
function generateID()
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
    $sql = "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC";
    $result = mysqli_query($conn, $sql);

    $nextNumber = 1;

    while ($row = mysqli_fetch_assoc($result)) {
      $NoJual = substr($row['id_pelanggan'], 3);
      if (!empty($NoJual)) {
        $nextNumber = max($nextNumber, intval($NoJual) + 1);
      }
    }

    $AN = sprintf("%04d", $nextNumber);
    $newID = "PNG" . $AN;

    // Tutup koneksi ke database
    mysqli_close($conn);

    return $newID;
  } catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
  }
}

// Panggil fungsi generateID() untuk mendapatkan ID baru
$kodeauto = generateID();
function generatepenjualan()
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
    $sql = "SELECT * FROM penjualan ORDER BY id_penjualan ASC";
    $result = mysqli_query($conn, $sql);

    $nextNumber = 1;

    while ($row = mysqli_fetch_assoc($result)) {
      $NoJual = substr($row['id_penjualan'], 3);
      if (!empty($NoJual)) {
        $nextNumber = max($nextNumber, intval($NoJual) + 1);
      }
    }

    $AN = sprintf("%04d", $nextNumber);
    $newID = "PNJ" . $AN;

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
  <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">

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
                <li><a href="index.php"><i class="fa fa-home"></i> Home <span></span></a>

                </li>
                <li><a href="DataAnggrek.php"><i class="fa fa-leaf"></i> Anggrek <span></span></a>

                </li>
                <li><a href="datasupplier.php"><i class="fa fa-truck"></i> Supplier <span></span></a>

                </li>
                <li><a href="datapelanggan.php"><i class="fa fa-user"></i> Pelanggan <span></span></a></li>
                <li><a href="datatransaksi.php"><i class="fa fa-money"></i> Transaksi <span></span></a></li>
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
              <h3>Form Transaksi</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Input Data Transaksi</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <!-- Smart Wizard -->

                  <form class="form-horizontal form-label-left" action="insert/insertTransaksi.php" method="post">
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Id Pelanggan</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" id="idpelanggan" name="idpelanggan" required="required"
                          value="<?php echo $kodeauto; ?>" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Id Penjualan</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="idpenjualan" name="idpenjualan" required="required" class="form-control"
                          value="<?php echo generatepenjualan(); ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Anggrek</label>
                      <div class="col-md-6 col-sm-6">
                        <select name="idanggrek" id="idanggrek" class="form-control">
                          <option value="" selected disabled>
                            -- Nama & Stok Anggrek --
                          </option>
                          <?php
                          $koneksi = mysqli_connect("localhost", "root", "", "anggrek");
                          if (mysqli_connect_errno()) {
                            echo "Koneksi ke database gagal: " . mysqli_connect_error();
                            exit();
                          }
                          $query = "SELECT id_anggrek, nama_anggrek, stok, harga FROM anggrek";
                          $result = mysqli_query($koneksi, $query);

                          while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_anggrek'] . "' data-stok='" . $row['stok'] . "' data-harga='" . $row['harga'] . "'>" . $row['nama_anggrek'] . " - Stok: " . $row['stok'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" id="nama" name="nama" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Alamat</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="text" id="alamat" name="alamat" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">No Telepon</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" id="notelepon" name="notelepon" required="required" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga</label>
                      <div class="col-md-6 col-sm-6">
                        <input type="number" id="harga" name="harga" required="required" class="form-control" readonly>
                        <script>
                          document.getElementById('idanggrek').addEventListener('change', function () {
                            var selectedOption = this.options[this.selectedIndex];
                            var selectedPrice = selectedOption.getAttribute('data-harga');
                            document.getElementById('harga').value = selectedPrice;
                          });
                        </script>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Jumlah</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="jumlah" name="jumlah" required="required" class="form-control ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Total</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="total" name="total" required="required" class="form-control"
                          oninput='hitungTotal();' readonly>

                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="tanggal" name="tanggal" required="required" class="form-control" readonly  >
                        <script src="assets/js/scripts.js"></script>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <!-- <button class="btn btn-primary" type="button">tambah</button> -->
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success" name="simpan">Submit</button>
                      </div>
                    </div>

                  </form>

                  <!-- End SmartWizard Content -->



                  <!-- End SmartWizard Content -->
                </div>
              </div>
            </div>
          </div>
          <!-- /page content -->

          <!-- footer content -->
          <footer>
            <div class="pull-right">
              Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
      <!-- jQuery Smart Wizard -->
      <script src="admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="admin/build/js/custom.min.js"></script>


      <script>
        function hitungTotal() {
          var harga = document.getElementById('harga').value;
          var jumlah = document.getElementById('jumlah').value;

          // Lakukan perhitungan
          var total = parseInt(harga) * parseInt(jumlah);

          // Tampilkan hasil pada input Total
          document.getElementById('total').value = total;
        }

        // Panggil fungsi hitungTotal saat nilai pada input harga atau jumlah berubah
        document.getElementById('harga').addEventListener('input', hitungTotal);
        document.getElementById('jumlah').addEventListener('input', hitungTotal);
      </script>
      <!-- Tambahkan kode ini di bagian <body> -->

</body>

</html>