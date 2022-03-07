<?php $menu = 'umkm' ?>
<?php include "header2.php" ?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>UKM/UMKM</h2>
                <ol>
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li>UKM/UMKM</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->
    
<!-- ======= Why Us Section ======= -->
<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
    <div class="container" style="margin-top: 20px">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="assets/img/banner/BANNER-TPL.jpg" alt="First slide">
                </div>
                <?php
                $sqlBanerUtama = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Baner Utama'");
                while ($dataBanerUtama = mysqli_fetch_array($sqlBanerUtama)) {
                ?>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="admin/img/Iklan/<?= $dataBanerUtama['gambar'] ?>" alt="Six slide">
                </div>
                 <?php } ?>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-2 d-flex align-items-stretch" >
                    <?php 
                    $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan UMKM 1'");
                    while($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
                    ?>
                        <div class="member">
                            <div class="member-img">
                                <img src="admin/img/Iklan/<?= $dataIklan1['gambar']?>" class="img-fluid" alt="" style="width: 100%">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <?php $sql = mysqli_query($konek, "SELECT * FROM umkm");
                        while ($u = mysqli_fetch_array($sql)) {
                        ?>
                        <style>
                        .team .col-md-6 {
                            max-width: 180px; 
                            max-height: 230px;
                            font-size: 12px;
                            font-weight: bold;
                        }
                        
                        @media (min-width: 992px) {
                            .team .col-md-6 {
                                max-width: 100%; 
                                max-height: 100%;
                                font-size: 10px;
                                font-weight: bold;
                            }
                        }
                </style>
                        <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <a href="<?= $u['Link_Mitra'] ?>" target="_blank" title="<?= $u['Nama'] ?>">
                                        <img src="admin/img/UMKM/<?= $u['gambar']; ?>" class="img-fluid" alt="" style="border-radius: 10px">
                                        <p><?= $u['Nama']; ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-2 d-flex align-items-stretch" style="width: 100%">
                    <?php 
                    $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan UMKM 2'");
                    while($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
                    ?>
                        <div class="member">
                            <div class="member-img">
                                <img src="admin/img/Iklan/<?= $dataIklan1['gambar']?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>