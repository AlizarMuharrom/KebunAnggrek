<?php
require_once("koneksi.php");

if (!empty($_POST)) {
    $supplier = $_POST["id-supplier"];
    $namaanggrek = $_POST["namaanggrek"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $query = "INSERT INTO anggrek(nama_anggrek, jenis, harga, stok, id_supplier) 
        VALUES ('$namaanggrek','$jenis','$harga','$stok','$supplier')";

    if (mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id_supplier from supplier where id_supplier = '$supplier'")) == null) {
        ?>
        <script type='module'>
            alert('Id Supplier tidak ditemukan');
        </script>
        <?php
    } else {
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            ?>
            <script type='module'>
                alert("Data berhasil ditambah!");
            </script>
            <?php
        } else {
            echo "Data gagal ditambahkan!";
            echo "Error : " . mysqli_error($koneksi);
        }
    }
}
?>