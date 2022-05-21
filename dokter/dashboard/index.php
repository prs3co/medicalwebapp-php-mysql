<?php include_once('../_header.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Dokter Card-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                                Dokter</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            $query = mysqli_query($con, "SELECT id_dokter FROM tb_dokter") or die (mysqli_error($con));
                                            $rowdokter = mysqli_num_rows($query);
                                            echo $rowdokter;
                                            ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pasien Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 font-weight-bold text-success text-uppercase mb-1">
                                                Pasien</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                            $query = mysqli_query($con, "SELECT id_pasien FROM tb_pasien") or die (mysqli_error($con));
                                            $rowpasien = mysqli_num_rows($query);
                                            echo $rowpasien;
                                            ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Obat Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 font-weight-bold text-info text-uppercase mb-1">Obat
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                    $query = mysqli_query($con, "SELECT id_obat FROM tb_obat") or die (mysqli_error($con));
                                                    $rowobat = mysqli_num_rows($query);
                                                    echo $rowobat;
                                                    ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pills fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h6 font-weight-bold text-warning text-uppercase mb-1">
                                                Poliklinik</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                    $query = mysqli_query($con, "SELECT id_poli FROM tb_poliklinik") or die (mysqli_error($con));
                                                    $rowpoli = mysqli_num_rows($query);
                                                    echo $rowpoli;
                                                    ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clinic-medical fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Welcome -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Illustrations -->
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="large font-weight-bold text-primary">Selamat Datang, <?= $_SESSION['name'] ?></h4>
                                        <br>
                                        <br>
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="<?=base_url('assets/img/undraw_posting_photo.svg');?>" alt="...">
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Persebaran</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Dokter
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Pasien
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Obat
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Poliklinik
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include_once('../_footer.php') ?>