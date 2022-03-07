<?php $menu = 'news' ?>
<?php include "header2.php" ?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>IKAITL News</h2></h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index">Halaman Utama</a></li>
                    <li>IKAITL News</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->

   <!-- ======= Blog Section ======= -->
<section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <div class="row">

            <div class="col-lg-8 entries">
                
                    <article class="entry">
                        <?php
                        $sql = mysqli_query($konek, "SELECT * FROM news ORDER BY ID_News DESC");
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
                        $ambilDataPerhalaman = mysqli_query($konek, "SELECT * FROM news ORDER BY ID_News DESC LIMIT $dataAwal,$jumlahData");
                        while($n = mysqli_fetch_array($ambilDataPerhalaman)) {
                        ?>
                            <div class="mb-2" style="margin-bottom: 20px">
                                <div class="entry-img">
                                    <img src="admin/img/News/<?= $n['gambar']; ?>" alt="" class="img-fluid" width="800px">
                                </div>
                
                                <h2 class="entry-title">
                                    <a href="blog-single.html"><?= $n['Judul_Berita']; ?></a>
                                </h2>
                
                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?= $n['Tanggal']; ?></time></li>
                                    </ul>
                                </div>
                                <div class="entry-content" style="text-align: justify">
                                    <p>
                                    <?= substr(strip_tags($n['Isi']),0,400)?>[...]
                                    </p>
                                </br>
                                    <div class="read-more">
                                        <a href="tampilan_news.php?ID_News=<?= $n['ID_News']?>">Selengkapnya <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div></br></br>
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
            </div><!-- End blog entries list -->

          

        </div><!-- End .row -->

      </div><!-- End .container -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->
<?php include "footer.php" ?>