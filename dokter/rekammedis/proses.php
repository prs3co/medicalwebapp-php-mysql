<?php
require_once "../../config/config.php";
require "../../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnstatisfiedDependencyException;

if (isset($_POST['add'])) {
    $uuid4 = Uuid::uuid4();
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $obat = $_POST['obat'];
    mysqli_query($con, "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) VALUES ('$uuid4', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tgl')") or die (mysqli_error($con));

    foreach ($obat as $obt) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$uuid4', '$obt')") or die (mysqli_error($con));
    }

    echo "<script>window.location='data.php'</script>>";
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $obat = $_POST['obat'];
    mysqli_query($con, "UPDATE tb_rekammedis SET id_pasien = '$pasien', keluhan = '$keluhan', id_dokter = '$dokter', diagnosa = '$diagnosa', id_poli = '$poli', tgl_periksa = '$tgl' WHERE  id_rm = '$id'") or die (mysqli_error($con));
    
    mysqli_query($con, "DELETE FROM tb_rm_obat WHERE id_rm = '$id'") or die (mysqli_error($con));
    
    foreach ($obat as $obt) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$id', '$obt')") or die (mysqli_error($con));
    }
    echo "<script>window.location='data.php'</script>>";
}