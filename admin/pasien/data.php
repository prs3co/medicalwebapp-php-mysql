<?php include_once('../_header.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pasien</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pasien
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
                                            <th>No Identitas</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Identitas</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>
                                            <th><i class="fas fa-cog"></i></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_pasien") or die (mysqli_error($con));
                                    if(mysqli_num_rows($sql_dokter) > 0) {
                                        while($data = mysqli_fetch_array($sql_dokter)) { ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$data['no_identitas']?></td>
                                                <td><?=$data['nama_pasien']?></td>
                                                <td><?=$data['jenis_kelamin']?></td>
                                                <td><?=$data['alamat']?></td>
                                                <td><?=$data['no_telp']?></td>
                                                <td class="text-center">
                                                    <a href="edit.php?id=<?=$data['id_pasien']?>" class="btn btn-info my-1 btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <br>
                                                    <a href="del.php?id=<?=$data['id_pasien']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger my-1 btn-sm">
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