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
                        <i class="fa fa-globe" style="margin-left: 500px;"></i> Laporan Penjualan Kebun Anggrek Budi Vespa Ndut
                        
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

        // Pastikan koneksi ke database berhasil
        if ($koneksi->connect_error) {
            die("Koneksi database gagal: " . $koneksi->connect_error);
        }

        $sql = $koneksi->prepare("
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
            WHERE MONTH(penjualan.tanggal_penjualan) = ?
        ");

        if (!$sql) {
            die("Kesalahan dalam persiapan statement: " . $koneksi->error);
        }

        $bln = isset($_GET['bln']) ? $_GET['bln'] : '';

        $sql->bind_param('s', $bln);

        $sql->execute();

        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            ?>
            <table class="table table-striped" style="width: 100%; border: 1px solid black">
                <thead style="border: 1px solid black;">
                    <tr class="warning" style="border: 1px solid black;">
                        <th style="font-size:12px; border: 1px solid black;"><center>Id Penjualan</center></th>
                        <th style="font-size:12px; border: 1px solid black;"><center>Nama Anggrek</center></th>
                        <th style="font-size:12px; border: 1px solid black;"><center>Nama Pelanggan</center></th>
                        <th style="font-size:12px; border: 1px solid black;"><center>Tanggal Penjualan</center></th>
                        <th style="font-size:12px; border: 1px solid black;"><center>Jumlah</center></th>
                        <th style="font-size:12px; border: 1px solid black;"><center>Total Harga</center></th>
                    </tr>
                </thead>
                <tbody style="border: 1px solid black;">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr style="border: 1px solid black;">
                            <td style="font-size:12px; border: 1px solid black;"><center><?php echo isset($row['id_penjualan']) ? $row['id_penjualan'] : ''; ?></center></td>
                            <td style="font-size:12px; border: 1px solid black;"><center><?php echo isset($row['nama_anggrek']) ? $row['nama_anggrek'] : ''; ?></center></td>
                            <td style="font-size:12px; border: 1px solid black;"><center><?php echo isset($row['nama_pelanggan']) ? $row['nama_pelanggan'] : ''; ?></center></td>
                            <td style="font-size:12px; border: 1px solid black;"><center><?php echo isset($row['tanggal_penjualan']) ? $row['tanggal_penjualan'] : ''; ?></center></td>
                            <td style="font-size:12px; border: 1px solid black;"><center><?php echo isset($row['jumlah_item']) ? $row['jumlah_item'] : ''; ?></center></td>
                            <td style="font-size:12px; border: 1px solid black;"><center><?php echo isset($row['total_harga']) ? $row['total_harga'] : ''; ?></center></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "Data tidak ditemukan.";
        }

        $sql->close();
        $koneksi->close();
        ?>
    </div>
    <!-- /.col -->
</div>            <!-- /.row -->

        </section>
    </div>

    <!-- ./wrapper -->
</body>

</html>