<?php $menu = 'tentang_alumni' ?>
<?php include "header2.php" ?>
<?php
session_start();

?>
<style>
    .section-bg .container .card .card-img-overlay h4 p {
        margin-top: 100px;
    }
</style>
<main id="main">

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Tentang Alumni</h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li>Tentang Alumni</li>
                </ol>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200" style="background: white;">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-user"></i></div>
                        <h4 class="title" style="margin-top: 25px"><a href="pengurus_ikaitl.php">Pengurus IKAITL Trisakti</a></h4>
                    </div>
                    
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file" aria-hidden="true"></i></div>
                        <h4 class="title" style="margin-top: 25px"><a href="#">Perwakilan Angkatan</a></h4>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title" style="margin-top: 25px"><a href="#">Perwakilan Daerah</a></h4>
                    </div>
                    <?php if (isset($_SESSION['Level'])) { ?>
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title" style="margin-top: 25px"><a href="kartu_anggota">Kartu Anggota Alumni</a></h4>
                        </div>
                    <?php } else { ?>
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title" style="margin-top: 25px"><a href="login">Kartu Anggota Alumni</a></h4>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->
    
</main><!-- End #main -->
<?php include "footer.php" ?>