<?php
require_once("../koneksi.php");

if (isset($_POST['update'])) {
    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['no_telp'];

    $query = "UPDATE pelanggan SET nama_pelanggan = '$nama', alamat = '$alamat', no_telp = '$notelp' WHERE id_pelanggan ='$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../datapelanggan.php");
        exit();
    } else {
        echo "Gagal mengupdate data Pelanggan: " . mysqli_error($koneksi);
    }
}
?>