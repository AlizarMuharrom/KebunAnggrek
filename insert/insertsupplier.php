<?php
require_once("..\koneksi.php");

if (!empty($_POST)) {
    $id = $_POST["no"];
    $nama = $_POST["namasupplier"];
    $alamat = $_POST["alamat"];
    $hp = $_POST["nomer"];

    $query = "INSERT INTO supplier(id_supplier, nama_supplier, alamat, no_telp) 
        VALUES ('$id','$nama','$alamat','$hp')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data berhasil ditambah!";
        header("location: ../formsupplier.php");
    } else {
        echo "Data gagal ditambahkan!";
        echo "Error : " . mysqli_error($koneksi);
    }
}
?>