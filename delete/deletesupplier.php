<?php
if ($_GET['reqkarya'] == "dell") {
    require_once "../koneksi.php";
    session_start();

    if (!empty($_GET)) {
        $output = '';
        $id = $_GET["id"];

        $query = "DELETE FROM supplier WHERE id_supplier = '$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {    
            header("location: ../datasupplier.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>