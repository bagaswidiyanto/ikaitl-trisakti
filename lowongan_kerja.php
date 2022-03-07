<?php $menu = 'lowongan_kerja' ?>
<?php include "header2.php" ?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Lowongan Kerja</h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li>Lowongan Kerja</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->
    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="https://wa.link/5fazsc" target="_blank" title="Hubungi Kami"><img src="assets/img/tombol.png" style="width: 40px; height:auto; margin-bottom: 20px;"><span style="margin-left: 10px">*Jika ada lowongan kerja silahkan hubungi Admin!</span></a>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-5" style=" height: 700px; width: 100%; overflow-y: scroll;">
                    <div class="card" data-aos="zoom-in" data-aos-delay="100">
                        <?php
                        $sql = mysqli_query($konek, "SELECT * FROM lowongan_kerja");
                        while ($loker = mysqli_fetch_array($sql)) {
                        ?>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="column">
                                        <img src="admin/img/LowonganKerja/<?= $loker['gambar']; ?>" alt="" style="width:100%; height: 100%; padding: 2px; background-color:darkgray;" onclick="myFunction(this);">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="card" style="height: 100%;;width: 100%" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card" style=" height: 700px; width: 100%; overflow-y: scroll;">
                            <div class="card-body">
                                <span onclick="this.parentElement.style.display='none'" class="closebtn float-right" style="color: red;"><i class="fa fa-times" aria-hidden="true"></i></span>
                                <img id="expandedImg" style="width:100%; margin-top: 20px">
                                <div id="imgtext"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>