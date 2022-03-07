<?php $menu = 'bisnis_alumni' ?>
<?php include "header2.php" ?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Bisnis Alumni</h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index">Halaman Utama</a></li>
                    <li>Bisnis Alumni</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">
                <?
                 $sql = mysqli_query($konek, "SELECT * FROM bisnis");
                 while ($b = mysqli_fetch_array($sql)) { ?>
                
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <a href="<?= $b['Link_Bisnis']; ?>" target="_blank" title="<?= $b['Nama_Bisnis']; ?>"> <!--1-->
                                <img src="admin/img/BisnisAlumni/<?= $b["gambar"]; ?>" class="img-fluid" alt="">
                             </a>
                            <!--<div class="social">-->
                            <!--    <a href=""><i class="icofont-twitter"></i></a>-->
                            <!--    <a href=""><i class="icofont-facebook"></i></a>-->
                            <!--    <a href=""><i class="icofont-instagram"></i></a>-->
                            <!--    <a href=""><i class="icofont-linkedin"></i></a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <?php } ?>
        </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>