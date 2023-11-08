<?php
require_once("../koneksi.php");

if (isset($_POST['delete']) && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM supplier WHERE id_supplier = ?";
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Data Supplier berhasil dihapus.";
        } else {
            echo mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_error($koneksi);
    }
} else {
    echo "Data Supplier gagal dihapus!";
}

mysqli_close($koneksi);
?>
