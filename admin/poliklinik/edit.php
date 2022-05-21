<?php 

require_once "../../config/config.php";

if (!isset($_POST['checked'])) {
    echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
} else {
    include_once('../_header.php');

?>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 align-self-center">
                            <div class="card shadow mb-4 border-bottom-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Poliklinik
                                        <div class="float-right">
                                            <a href="data.php" class="ml-1 btn btn-warning btn-sm">
                                                <i class="fas fa-backward"></i>
                                            </a>
                                        </div>
                                    </h6>
                                </div>
                                <div class="card-body">
                                        <form action="proses.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                                                <table class="table">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Poliklinik</th>
                                                        <th>Gedung</th>
                                                    </tr>
                                                    <?php
                                                    $no = 1;
                                                    foreach($_POST['checked'] as $id) { 
                                                        $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik WHERE id_poli = '$id'") or die (mysqli_error($con));
                                                        while($data = mysqli_fetch_array($sql_poli)) {
                                                        ?> 
                                                        <tr>
                                                            <td><?=$no++?></td>
                                                            <td>
                                                                <input type="hidden" name="id[]" value="<?=$data['id_poli']?>">
                                                                <input type="text" name="nama[]" value="<?=$data['nama_poli']?>" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="gedung[]" value="<?=$data['gedung']?>" class="form-control" required>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div class="form-group float-right">
                                                <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php
include_once('../_footer.php');
}
?>