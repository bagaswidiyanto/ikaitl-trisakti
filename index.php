<?php $menu = 'index' ?>
<?php include "header.php"; ?>

<img src="assets/img/banner-web-itl-newww.jpg" alt="" style="width: 100%;">


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

<!-- ======= Why Us Section ======= -->
<div class="container" data-aos="fade-up" date-aos-delay="200">
    <div class="row">
        <?php
        $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan 1'");
        while ($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
        ?>
            <div class="col-lg-6 video-box">
                <img src="admin/img/Iklan/<?= $dataIklan1['gambar'] ?>" class="img-fluid" alt="">
            </div>
        <?php } ?>
        <?php
        $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan 2'");
        while ($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
        ?>
            <div class="col-lg-6 video-box">
                <img src="admin/img/Iklan/<?= $dataIklan1['gambar'] ?>" class="img-fluid" alt="">
            </div>
        <?php } ?>
    </div>
</div>

<!-- ======= Why Us Section ======= -->
<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
    <div class="container">
        <?php
        $sql = mysqli_query($konek, "SELECT * FROM video");
        while ($v = mysqli_fetch_array($sql)) {
        ?>
            <div class="row">
                <style>
                    video {
                        width: 362px;
                        height: 350px;
                    }

                    @media (min-width: 992px) {
                        video {
                            width: 478px;
                            height: 350px;
                        }
                    }
                </style>

                <div class="col-lg-6 video-box">

                    <video controls>
                        <source class="video" src="admin/img/Video/<?= $v['Video'] ?>" type="video/mp4">
                    </video>
                </div>

                <div class="col-lg-6 justify-content-center mt-5">
                    <h4 class="title text-bold"><?= $v['Judul'] ?></h4>
                    <p class="description" style="text-align: justify">
                        <?= substr(strip_tags($v['Isi']), 0, 600) ?>[...]
                    </p>

                    <div class="read-more" style="text-align-last: right">
                        <a href="tampilan_video.php?ID_Video=<?= $v['ID_Video'] ?>">Selengkapnya <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section><!-- End Why Us Section -->


<!-- ======= Blog Section ======= -->
<section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

        <div class="row">

            <div class="col-lg-8 entries">
                <article class="entry">
                    <?php
                    $sql = mysqli_query($konek, "SELECT * FROM berita WHERE Jenis_Konfigurasi = 'Vertikal'");
                    // Konfigurasi Pagination
                    $jumlahData = 5;
                    $totalData = mysqli_num_rows($sql);
                    $jumlahPagination = ceil($totalData / $jumlahData);

                    if (isset($_GET['halaman'])) {
                        $halamanAktif = $_GET['halaman'];
                    } else {
                        $halamanAktif = 1;
                    }
                    $dataAwal = ($halamanAktif * $jumlahData) - $jumlahData;

                    $jumlahLink = 3;
                    if ($halamanAktif > $jumlahLink) {
                        $startNumber = $halamanAktif - $jumlahLink;
                    } else {
                        $startNumber = 1;
                    }

                    if ($halamanAktif < ($jumlahPagination - $jumlahLink)) {
                        $endNumber = $halamanAktif + $jumlahLink;
                    } else {
                        $endNumber = $jumlahPagination;
                    }
                    // END
                    $ambilDataPerhalaman = mysqli_query($konek, "SELECT * FROM berita WHERE Jenis_Konfigurasi = 'Vertikal' ORDER BY ID_Berita DESC LIMIT $dataAwal,$jumlahData");

                    while ($b = mysqli_fetch_assoc($ambilDataPerhalaman)) {
                    ?>
                        <a href="<?= $b['Link_Berita']; ?>" target="_blank" title="<?= $b['Judul_Berita'] ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="entry-img">
                                        <img src="admin/img/Berita/<?= $b['gambar']; ?>" alt="" class="img-fluid ml-2">
                                    </div>
                                </div>
                                <div style="margin-left: 20px;">

                                </div>
                                <div class="col-md-8">
                                    <h5><?= $b['Judul_Berita']; ?></h5>
                                    <div class="entry-meta" style="margin-top: 18px;">
                                        <ul>
                                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?= $b['Tanggal']; ?></time></li>
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </a>
                        <br>
                    <?php } ?>
                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <!-- Menampilkan Pagination -->
                            <?php if ($halamanAktif > 1) : ?>
                                <li><a href="?halaman=<?= $halamanAktif - 1 ?>">
                                        <i class="icofont-rounded-left"></i>
                                    </a></li>
                            <?php endif ?>
                            <?php
                            for ($i = $startNumber; $i <= $endNumber; $i++) :
                                $color = "color:; background:"  . ($halamanAktif == 'active' ? 'AliceBlue' : '#073C64') . "";
                            ?>

                                <?php
                                if ($halamanAktif == $i) : ?>
                                    <li><a href="?halaman=<?= $i; ?>" style="<?= $color; ?>">
                                            <?= $i; ?>
                                        </a></li>
                                <?php else : ?>
                                    <li><a href="?halaman=<?= $i; ?>">
                                            <?= $i; ?>
                                        </a></li>
                                <?php endif; ?>

                            <?php endfor; ?>
                            <?php if ($halamanAktif < $jumlahPagination) : ?>
                                <li><a href="?halaman=<?= $halamanAktif + 1 ?>">
                                        <i class="icofont-rounded-right"></i>
                                    </a></li>
                            <?php endif ?>
                            <!-- END -->
                        </ul>
                    </div>
                </article>
                <!-- End blog entry -->
            </div>
            <!-- End blog entries list -->

            <div class="col-lg-4">
                <div class="sidebar">
                    <?php
                    $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan 3'");
                    while ($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
                    ?>
                        <img src="admin/img/Iklan/<?= $dataIklan1['gambar'] ?>" alt="" style="max-width: 100%;">
                    <?php } ?>
                    <h3 class="sidebar-title" style="margin-top: 20px;">Terbaru</h3>
                    <div class="sidebar-item recent-posts">
                        <?php
                        $sql = mysqli_query($konek, "SELECT * FROM berita WHERE Jenis_Konfigurasi = 'Sidebar'");
                        while ($b = mysqli_fetch_array($sql)) {
                        ?>
                            <a href="<?= $b['Link_Berita']; ?>" target="_blank" title="<?= $b['Judul_Berita'] ?>">
                                <div class="post-item clearfix">
                                    <img src="admin/img/Berita/<?= $b['gambar']; ?>" alt="">
                                    <h4>
                                        <?php
                                        $kata = $b['Judul_Berita'];
                                        echo substr($kata, 0, 37);
                                        echo "[...]";
                                        ?>
                                    </h4>
                                    <time><?= $b['Tanggal']; ?></time>
                                </div>
                            </a>
                        <?php } ?>
                    </div><!-- End sidebar recent posts-->

                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->

        </div><!-- End .row -->

    </div><!-- End .container -->

</section><!-- End Blog Section -->


<!-- ======= Why Us Section ======= -->
<div class="container" data-aos="fade-up" date-aos-delay="200">
    <div class="row">
        <?php
        $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan 4'");
        while ($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
        ?>
            <div class="col-lg-6 video-box">
                <img src="admin/img/Iklan/<?= $dataIklan1['gambar'] ?>" class="img-fluid" alt="">
            </div>
        <?php } ?>
        <?php
        $sqlIklan1 = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan 5'");
        while ($dataIklan1 = mysqli_fetch_array($sqlIklan1)) {
        ?>
            <div class="col-lg-6 video-box">
                <img src="admin/img/Iklan/<?= $dataIklan1['gambar'] ?>" class="img-fluid" alt="">
            </div>
        <?php } ?>
    </div>
</div>
<br>


<!-- ======= Clients Section ======= -->
<section id="clients" class="clients" data-aos="fade-up" date-aos-delay="200">
    <div class="container" data-aos="zoom-in">
        <div class="owl-carousel clients-carousel">
            <?php $sql = mysqli_query($konek, "SELECT * FROM umkm");
            while ($u = mysqli_fetch_array($sql)) : ?>
                <a href="<?= $u['Link_Mitra']; ?>" target="_blank" title="<?= $u['Nama'] ?>">
                    <img src="admin/img/UMKM/<?= $u['gambar']; ?>" alt="">
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<!-- End Clients Section -->
<?php include "footer.php" ?>
<script src="script.js"></script>