<?php $menu = 'news' ?>
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

                <?php 
                $sql = mysqli_query($konek, "SELECT * FROM news WHERE ID_News='$_GET[ID_News]'");
                $tn = mysqli_fetch_array($sql);
                ?>
                    <article class="entry">
                        <div class="entry-img">
                            <img src="admin/img/News/<?= $tn['gambar']; ?>" alt="" class="img-fluid">
                        </div>
        
                        <h3 style="color: #32627b">
                            <?= $tn['Judul_Berita']; ?>
                        </h3>
        
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i><time><?= $tn['Tanggal']; ?></time></li>
                            </ul>
                        </div>
                
                        <div class="entry-content" style="text-align: justify">
                            <p>
                              <?= $tn['Isi']; ?>
                            </p>
                        </div>
                    </article>
            </div><!-- End blog entries list -->

        </div><!-- End .row -->

      </div><!-- End .container -->

    </section><!-- End Blog Section -->

  </main><!-- End #main -->
<?php include "footer.php" ?>