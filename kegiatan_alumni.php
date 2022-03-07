<?php $menu = 'kegiatan_alumni' ?>
<?php include "header2.php" ?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Komunitas Alumni</h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index">Halaman Utama</a></li>
                    <li>Komunitas Alumni</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">
                <?php
                $sqlKomunitas = mysqli_query($konek, "SELECT * FROM gambar_komunitas");
                while ($dataKomunitas = mysqli_fetch_array($sqlKomunitas)) {
                ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <img src="admin/img/GambarKomunitas/<?= $dataKomunitas['gambar'] ?>" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="<?= $dataKomunitas['Link'] ?>"><?= $dataKomunitas['Nama_Komunitas'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>