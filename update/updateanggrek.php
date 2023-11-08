<?php
require_once("../koneksi.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "UPDATE anggrek SET nama_anggrek = '$nama', jenis = '$jenis', harga = '$harga', stok = '$stok' WHERE id_anggrek ='$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../DataAnggrek.php");
        exit(); // Pastikan untuk keluar setelah pengalihan
    } else {
        echo "Gagal mengupdate data Anggrek: " . mysqli_error($koneksi);
    }
}
?>