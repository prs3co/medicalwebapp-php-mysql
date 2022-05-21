<?php include_once('../_header.php');

?>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 align-self-center">
                            <div class="card shadow mb-4 border-bottom-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Rekam Medis
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
                                                <label for="pasien">Pasien</label>
                                                <select name="pasien" id="pasien" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    <?php
                                                    $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die (mysqli_error($con));
                                                    while($data_pasien = mysqli_fetch_array($sql_pasien)) {
                                                        echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="keluhan">Keluhan</label>
                                                <textarea name="keluhan" id="keluhan" class="form-control" required cols="30" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="dokter">Dokter</label>
                                                <select name="dokter" id="dokter" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    <?php
                                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                                                    while($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                                        echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="diagnosa">Diagnosa</label>
                                                <textarea name="diagnosa" id="diagnosa" class="form-control" required cols="30" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="poli">Poliklinik</label>
                                                <select name="poli" id="poli" class="form-control" required>
                                                    <option value="">- Pilih -</option>
                                                    <?php
                                                    $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($con));
                                                    while($data_poli = mysqli_fetch_array($sql_poli)) {
                                                        echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
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
                                                        echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl">Tanggal Periksa</label>
                                                <input type="date" name="tgl" id="tgl" value="<?=date('Y-m-d')?>" class="form-control" required>
                                            </div>
                                            <div class="form-group float-right">
                                                <input type="submit" name="add" value="Simpan" class="btn btn-success">
                                                <input type="reset" name="reset" value="Reset" class="btn btn-light">
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php include_once('../_footer.php');
?>