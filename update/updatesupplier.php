<?php
require_once("../koneksi.php");

if (isset($_POST['update'])) {
    $id = $_POST['id_supplier'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];

    $query = "UPDATE supplier SET nama_supplier = '$nama', alamat = '$alamat', no_telp = '$notelp' WHERE id_supplier ='$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: ../datasupplier.php");
        exit();
    } else {
        echo "Gagal mengupdate data Supplier: " . mysqli_error($koneksi);
    }
}
?>