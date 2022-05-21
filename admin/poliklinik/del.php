<?php 

require_once "../../config/config.php";

if (!isset($_POST['checked'])) {
    echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
} else {
    foreach($_POST['checked'] as $id) {
        $sql = mysqli_query($con, "DELETE FROM tb_poliklinik WHERE id_poli = '$id'") or die (mysqli_error($con));
    }

    if ($sql) {
        echo "<script>alert('".count($_POST['checked'])." Data Berhasil Dihapus'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus');</script>";
    }
}
?>
