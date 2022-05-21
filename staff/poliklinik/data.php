<?php include_once('../_header.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Poliklinik</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Poliklinik
                            <div class="float-right">
                                <a href="" class="ml-1 btn btn-warning btn-sm">
                                    <i class="fas fa-redo px"></i>
                                </a>
                                <a href="generate.php" class="ml-1 btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a class="ml-1 btn btn-info btn-sm" onclick="edit()">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="ml-1 btn btn-danger btn-sm" onclick="hapus()">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            </h6>
                            
                        </div>
                        <div class="card-body">
                            <form method="post" name="proses">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Poli</th>
                                                <th>Gedung</th>
                                                <th>
                                                    <center>
                                                        <input type="checkbox" id="select_all" value="">
                                                    </center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($con));
                                        if(mysqli_num_rows($sql_poli) > 0) {
                                            while($data = mysqli_fetch_array($sql_poli)) { ?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?=$data['nama_poli']?></td>
                                                    <td><?=$data['gedung']?></td>
                                                    <td align="center">
                                                        <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_poli']?>">
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
                            </form>
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <script>
            $(document).ready(function() {
                $('#select_all').on('click', function() {
                    if(this.checked) {
                        $('.check').each(function() {
                            this.checked = true;
                        })
                    } else {
                        $('.check').each(function() {
                            this.checked = false;
                        })
                    }
                });

                $('.check').on('click', function() {
                    if( $('.check:checked').length == $('.check').length) {
                        $('#select_all').prop('checked', true)
                    } else {
                        $('#select_all').prop('checked', false)
                    }
                })
            });

            function edit() {
                document.proses.action = 'edit.php';
                document.proses.submit();
            }
            function hapus() {
                var conf = confirm('Yakin akan menghapus data?');
                if(conf) {
                    document.proses.action = 'del.php';
                    document.proses.submit();
                }
            }
            </script>


<?php include_once('../_footer.php') ?>