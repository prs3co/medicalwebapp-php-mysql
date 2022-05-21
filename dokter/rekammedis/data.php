<?php include_once('../_header.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Rekam Medis</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Rekam Medis
                            <div class="float-right">
                                <a href="" class="ml-1 btn btn-warning btn-sm">
                                    <i class="fas fa-redo px"></i>
                                </a>
                                <a href="add.php" class="ml-1 btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            </h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Periksa</th>
                                            <th>Nama Pasien</th>
                                            <th>Keluhan</th>
                                            <th>Nama Dokter</th>
                                            <th>Diagnosa</th>
                                            <th>Poliklinik</th>
                                            <th>Data Obat</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Periksa</th>
                                            <th>Nama Pasien</th>
                                            <th>Keluhan</th>
                                            <th>Nama Dokter</th>
                                            <th>Diagnosa</th>
                                            <th>Poliklinik</th>
                                            <th>Data Obat</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $query = "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli ORDER BY tgl_periksa DESC";
                                    $sql_rm = mysqli_query($con, $query) or die (mysqli_error($con));
                                    if(mysqli_num_rows($sql_rm) > 0) {
                                        while($data = mysqli_fetch_array($sql_rm)) { ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=tgl_format($data['tgl_periksa'])?></td>
                                                <td><?=$data['nama_pasien']?></td>
                                                <td><?=$data['keluhan']?></td>
                                                <td><?=$data['nama_dokter']?></td>
                                                <td><?=$data['diagnosa']?></td>
                                                <td><?=$data['nama_poli']?></td>
                                                <td>
                                                    <?php
                                                    $sql_obat = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
                                                    while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                                        echo $data_obat['nama_obat']."<br>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="del.php?id=<?=$data['id_rm']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger my-1 btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<?php include_once('../_footer.php') ?>