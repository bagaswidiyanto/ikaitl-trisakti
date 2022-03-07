<?php $menu = 'souvenir' ?>
<?php include "header2.php" ?>
<?php
//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com

function rupiah($angka)
{

    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
?>
<main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Souvenir IKAITL</h2>
                <ol>
                    <i class="fa fa-home" aria-hidden="true" style="margin-top: 4px; margin-right:10px"></i>
                    <li><a href="index">Halaman Utama</a></li>
                    <li>Souvenir IKAITL</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">
                <?php 
                $sql = mysqli_query($konek, "SELECT * FROM souvenir");
                while($g = mysqli_fetch_array($sql)) {
                ?>
                <style>
                    .team .col-lg-3 {
                        max-width: 180px; 
                        max-height: 230px;
                    }
                    
                    .team .col-lg-3 .card a {
                        font-size: 10px;
                    }
                    
                    @media (min-width: 992px) {
                        .team .col-lg-3 {
                            max-width: 100%; 
                            max-height: 100%;
                        }
                        .team .col-lg-3 .card a {
                            font-size: 16px;
                        }
                    }
                    

                </style>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">
                                <div class="card" >
                                    <img src="admin/img/Souvenir/<?= $g['gambar'] ?>" class="img-fluid" alt="">
                                    <div class="social" style="height: 36px">
                                        <a href="https://wa.me/6287820595612" target="_blank">Silahkan Hubungi pengurus</a>
                                    </div>
                                    <p class="card-title text-bold"><?= $g['Nama_Barang'] ?></p>
                                    <p class="card-title text-bold" style="background-color: aliceblue; color: #073C64"><?= rp($g['Harga']) ?></p>
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