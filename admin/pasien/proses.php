<?php
require_once "../../config/config.php";
require "../../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnstatisfiedDependencyException;

if (isset($_POST['add'])) {
    $uuid4 = Uuid::uuid4();
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $sql_chk_idn = mysqli_query($con, "SELECT * FROM tb_pasien WHERE no_identitas = '$identitas'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_chk_idn) > 0) {
        echo "<script>alert('Nomor Identitas sudah digunakan');window.location='add.php'</script>>";
    } else {
        mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid4', '$identitas', '$nama', '$jk', '$alamat', '$telp')") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>>";
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    mysqli_query($con, "UPDATE tb_pasien SET no_identitas = '$identitas', nama_pasien = '$nama', jenis_kelamin = '$jk', alamat = '$alamat', no_telp = '$telp' WHERE  id_pasien = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>>";
}