<?php include_once('../_header.php');

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9 align-self-center">
            <div class="card shadow mb-4 border-bottom-info">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Pasien
                        <div class="float-right">
                            <a href="data.php" class="ml-1 btn btn-warning btn-sm">
                                <i class="fas fa-backward"></i>
                            </a>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <?php 
                    $id = @$_GET['id'];
                    $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_pasien);
                    ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="identitas">No Identitas</label>
                            <input type="text" name="identitas" id="identitas" value="<?= $data['no_identitas']?>" class="form-control" required autofocus>
                            <input type="hidden" name="id" value="<?= $data['id_pasien']?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" name="nama" id="nama" value="<?= $data['nama_pasien']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div>
                                <label class="radio-inline mr-3">
                                    <input type="radio" name="jk" value="L" required <?php if($data['jenis_kelamin'] == 'L') {
                                    echo 'checked';
                                    } else {echo '';}?>> Laki - Laki
                                </label>
                                <label class="radio-inline mr-3" >
                                    <input type="radio" name="jk" value="P" required <?php if($data['jenis_kelamin'] == 'P') {
                                    echo 'checked';
                                    } else {echo '';}?> > Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required cols="30" rows="3"><?= $data['alamat']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telpon</label>
                            <input type="text" name="telp" id="telp" value="<?= $data['no_telp']?>" class="form-control" required>
                        </div>
                        <div class="form-group float-right">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('../_footer.php');
?>