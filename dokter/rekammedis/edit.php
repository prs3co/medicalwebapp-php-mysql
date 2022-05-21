<?php include_once('../_header.php');

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9 align-self-center">
            <div class="card shadow mb-4 border-bottom-info">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Rekam Medis
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
                    $query = "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli WHERE id_rm = '$id'";
                    $sql_rm = mysqli_query($con, $query) or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_rm);
                    ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="pasien">Pasien</label>
                            <input type="hidden" name="id" value="<?= $data['id_rm']?>">
                            <select name="pasien" id="pasien" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die (mysqli_error($con));
                                while($data_pasien = mysqli_fetch_array($sql_pasien)) {
                                    echo '<option value="'.$data_pasien['id_pasien'].'"'.(($data['nama_pasien'] == $data_pasien['nama_pasien'])?'selected="selected"':"").'>'.$data_pasien['nama_pasien'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keluhan">Keluhan</label>
                            <textarea name="keluhan" id="keluhan" class="form-control" required cols="30" rows="3"><?=$data['keluhan']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dokter">Dokter</label>
                            <select name="dokter" id="dokter" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                                while($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                    echo '<option value="'.$data_dokter['id_dokter'].'"'.(($data['nama_dokter'] == $data_dokter['nama_dokter'])?'selected="selected"':"").'>'.$data_dokter['nama_dokter'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="diagnosa">Diagnosa</label>
                            <textarea name="diagnosa" id="diagnosa" class="form-control" required cols="30" rows="3"><?=$data['diagnosa']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="poli">Poliklinik</label>
                            <select name="poli" id="poli" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($con));
                                while($data_poli = mysqli_fetch_array($sql_poli)) {
                                    echo '<option value="'.$data_poli['id_poli'].'"'.(($data['nama_poli'] == $data_poli['nama_poli'])?'selected="selected"':"").'>'.$data_poli['nama_poli'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="obat">Obat</label>
                            <select multiple name="obat[]" id="obat" class="form-control" required>
                                <?php
                                
                                $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat ORDER BY nama_obat ASC") or die (mysqli_error($con));
                                while($data_obat = mysqli_fetch_array($sql_obat)) {
                                    echo '<option value="'.$data_obat['id_obat'].'"';
                                    $dataobatrmsql = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
                                    while ($dataobatrm = mysqli_fetch_array($dataobatrmsql)) {
                                        if ($dataobatrm['nama_obat'] == $data_obat['nama_obat']) {
                                            echo 'selected="selected"';
                                        } else {
                                            echo '';
                                        }
                                    }
                                    echo '>'.$data_obat['nama_obat'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Periksa</label>
                            <input type="date" name="tgl" id="tgl" value="<?=$data['tgl_periksa']?>" class="form-control" required>
                        </div>
                        <div class="form-group float-right">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                            <input type="reset" name="reset" value="Reset" class="btn btn-light">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('../_footer.php');
?>