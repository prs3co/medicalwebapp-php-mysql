<?php include_once('../_header.php');

?>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 align-self-center">
                            <div class="card shadow mb-4 border-bottom-info">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Poli
                                        <div class="float-right">
                                            <a href="data.php" class="ml-1 btn btn-warning btn-sm">
                                                <i class="fas fa-backward"></i>
                                            </a>
                                        </div>
                                    </h6>
                                </div>
                                <div class="card-body">
                                        <form action="add.php" method="post">
                                            <div class="form-group">
                                                <label for="count_add">Jumlah Record Yang Ditambahkan</label>
                                                <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control" required autofocus>
                                            </div>
                                            <div class="form-group float-right">
                                                <input type="submit" name="generate" value="Tambah" class="btn btn-success">
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>

<?php include_once('../_footer.php');
?>