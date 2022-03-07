<?php $menu = 'index' ?>
<?php include "header.php" ?>
<?php
            // jumlah berita
            $result = mysqli_query($konek, "SELECT COUNT(ID_Berita) as totalBerita FROM berita");
            $dataBerita = mysqli_fetch_assoc($result);

            // jumlah IKAITL News
            $result = mysqli_query($konek, "SELECT COUNT(ID_News) as totalNews FROM news");
            $dataNews = mysqli_fetch_assoc($result);

            // jumlah Lowongan Kerja
            $result = mysqli_query($konek, "SELECT COUNT(ID_Lowongan_Kerja) as totalLowonganKerja FROM lowongan_kerja");
            $dataLowonganKerja = mysqli_fetch_assoc($result);

            // jumlah Komunitas
            $result = mysqli_query($konek, "SELECT COUNT(ID_Komunitas) as totalKomunitas FROM komunitas");
            $dataKomunitas = mysqli_fetch_assoc($result);

            // jumlah UMKM
            $result = mysqli_query($konek, "SELECT COUNT(ID_UMKM) as totalUMKM FROM umkm");
            $dataUMKM = mysqli_fetch_assoc($result);

            // jumlah Souvenir
            $result = mysqli_query($konek, "SELECT COUNT(ID_Souvenir) as totalSouvenir FROM souvenir");
            $dataSouvenir = mysqli_fetch_assoc($result);
            ?>

            <div class="main-content">
                <div class="container-fluid">
                    <div class="row clearfix">

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Total Berita</h6>
                                            <h2><?= $dataBerita['totalBerita']; ?></h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-layers"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Total IKAITL News</h6>
                                            <h2><?= $dataNews['totalNews']; ?></h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-layers"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Total Lowongan Kerja</h6>
                                            <h2><?= $dataLowonganKerja['totalLowonganKerja']; ?></h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-file-text"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Total Komunitas</h6>
                                            <h2><?= $dataKomunitas['totalKomunitas']; ?></h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-life-buoy"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Total UMKM</h6>
                                            <h2><?= $dataUMKM['totalUMKM']; ?></h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="state">
                                            <h6>Total Souvenir</h6>
                                            <h2><?= $dataSouvenir['totalSouvenir']; ?></h2>
                                        </div>
                                        <div class="icon">
                                            <i class="ik ik-image"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

<?php include "footer.php" ?>