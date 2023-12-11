<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian</title>
</head>

<body onload="window.print();">

    <div class="wrapper" style="padding: 20px 50px;">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Kebun Anggrek
                        <small class="pull-right">Tanggal:
                            <?php echo date('d F Y'); ?>
                        </small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <h1 class="text-center">Laporan</h1>
                <div class="table-responsive table-bordered" style="width: 100%;">
                    <?php
                    include 'koneksi.php';
                    $id_penjualan = $_GET['id_penjualan'];
                    $sql = mysqli_query($koneksi, "
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
                        penjualan.id_penjualan = '$id_penjualan'
                    ");
                    if ($sql && mysqli_num_rows($sql) > 0) {
                        // Display table header only once
                        ?>
                        <table class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr class="warning">
                                    <th style="font-size:12px;">
                                        <center>Id Penjualan</center>
                                    </th>
                                    <th style="font-size:12px;">
                                        <center>Nama Anggrek</center>
                                    </th>
                                    <th style="font-size:12px;">
                                        <center>Nama Pelanggan</center>
                                    </th>
                                    <th style="font-size:12px;">
                                        <center>Tanggal Penjualan</center>
                                    </th>
                                    <th style="font-size:12px;">
                                        <center>Jumlah</center>
                                    </th>
                                    <th style="font-size:12px;">
                                        <center>Total Harga</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($sql)) {
                                    // Use a loop to fetch and display all rows
                                    ?>
                                    <tr>
                                        <td style="font-size:12px;">
                                            <center>
                                                <?php echo isset($row['id_penjualan']) ? $row['id_penjualan'] : ''; ?>
                                            </center>
                                        </td>
                                        <td style="font-size:12px;">
                                            <center>
                                                <?php echo isset($row['nama_anggrek']) ? $row['nama_anggrek'] : ''; ?>
                                            </center>
                                        </td>
                                        <td style="font-size:12px;">
                                            <center>
                                                <?php echo isset($row['nama_pelanggan']) ? $row['nama_pelanggan'] : ''; ?>
                                            </center>
                                        </td>
                                        <td style="font-size:12px;">
                                            <center>
                                                <?php echo isset($row['tanggal_penjualan']) ? $row['tanggal_penjualan'] : ''; ?>
                                            </center>
                                        </td>
                                        <td style="font-size:12px;">
                                            <center>
                                                <?php echo isset($row['jumlah_item']) ? $row['jumlah_item'] : ''; ?>
                                            </center>
                                        </td>
                                        <td style="font-size:12px;">
                                            <center>
                                                <?php echo isset($row['total_harga']) ? $row['total_harga'] : ''; ?>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    } else {
                        // Tampilkan pesan jika data tidak ditemukan
                        echo "Data tidak ditemukan.";
                        exit; // Keluar dari script
                    }
                    ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
    </div>

    <!-- ./wrapper -->
</body>

</html>