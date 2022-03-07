<?php $menu = 'index' ?>
<?php include "header2.php" ?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>IKAITL News</h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li>Video IKA ITL</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Blog Section ======= -->
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 entries">

                    <?php
                    $sql = mysqli_query($konek, "SELECT * FROM video WHERE ID_Video='$_GET[ID_Video]'");
                    $v = mysqli_fetch_array($sql);
                    ?>
                    <article class="entry">
                        <div class="col-lg-6 video-box">

                            <video controls>
                                <source class="video" src="admin/img/Video/<?= $v['Video'] ?>" type="video/mp4">
                            </video>


                            <h3 style="color: #32627b">
                                <?= $v['Judul']; ?>
                            </h3>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?= $v['Tanggal']; ?></time></li>
                                </ul>
                            </div>
                        </div>

                            <div class="entry-content" style="text-align: justify">
                                <p>
                                    <?= $v['Isi']; ?>
                                </p>
                            </div>
                    </article>
                </div><!-- End blog entries list -->

            </div><!-- End .row -->

        </div><!-- End .container -->

    </section><!-- End Blog Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>