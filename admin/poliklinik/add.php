<?php include_once('../_header.php');

?>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 align-self-center">
                            <div class="card shadow mb-4 border-bottom-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Poliklinik
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
                                                    for ($i=1; $i <=$_POST['count_add']; $i++) { ?> 
                                                        <tr>
                                                            <td><?=$i?></td>
                                                            <td>
                                                                <input type="text" name="nama-<?=$i?>" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="gedung-<?=$i?>" class="form-control" required>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                            <div class="form-group float-right">
                                                <input type="submit" name="add" value="Tambah" class="btn btn-success">
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php include_once('../_footer.php');
?>