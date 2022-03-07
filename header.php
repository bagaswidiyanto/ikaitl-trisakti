<?php
include "koneksi.php";
session_start();

$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>IKA/ITL Trisakti</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/LOGO-ITL-TRANSPARAN.png" rel="icon">
    <link href="assets/img/LOGO-ITL-TRANSPARAN.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Moderna - v2.2.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container">

            <div class="logo float-left">
                <p class="text-light"><span>IKAITL Trisakti</span></p>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu float-right d-none d-lg-block">
                <?php
                if ($menu == 'index') {
                    $index                = 'active';
                    $text_index           = 'text-info';
                } elseif ($menu == 'tentang_alumni') {
                    $tentang_alumni       = 'active';
                    $text_tentang_alumni  = 'text-info';
                } elseif ($menu == 'kegiatan_alumni') {
                    $kegiatan_alumni      = 'active';
                    $text_kegiatan_alumni = 'text-info';
                } elseif ($menu == 'lowongan_kerja') {
                    $lowongan_kerja       = 'active';
                    $text_lowongan_kerja  = 'text-info';
                } elseif ($menu == 'news') {
                    $news                 = 'active';
                    $text_news            = 'text-info';
                } elseif ($menu == 'souvenir') {
                    $lainnya              = 'active open';
                    $text_souvenir        = 'text-info';
                    $souvenir             = 'active';
                } elseif ($menu == 'umkm') {
                    $lainnya              = 'active open';
                    $text_umkm            = 'text-info';
                    $umkm                 = 'active';
                } elseif ($menu == 'bisnis_alumni') {
                    $lainnya              = 'active open';
                    $text_bisnis_alumni   = 'text-info';
                    $bisnis_alumni        = 'active';
                }
                ?>
                <ul style="font-size: 12px">
                    <li class="<?= $index; ?>">
                        <a class="<?= $text_index; ?>" href="index.php" title="Halaman Utama">Halaman Utama</a>
                    </li>
                    <li class="<?= $news; ?>">
                        <a class="<?= $text_news; ?>" href="ikaitl_news.php" title="IKAITL News">IKAITL News</a>
                    </li>
                    <li class="<?= $tentang_alumni; ?>">
                        <a class="<?= $text_tentang_alumni; ?>" href="tentang_alumni.php" title="Tentang IKAITL">Tentang IKAITL</a>
                    </li>
                    <li class="<?= $kegiatan_alumni; ?>">
                        <a class="<?= $text_kegiatan_alumni; ?>" href="kegiatan_alumni.php" title="Komunitas Alumni">Komunitas Alumni</a>
                    </li>
                    <li class="<?= $lowongan_kerja; ?>">
                        <a class="<?= $text_lowongan_kerja; ?>" href="lowongan_kerja.php" title="Lowongan Kerja">Lowongan Kerja</a>
                    </li>
                    <li class="drop-down <?= $lainnya; ?>"><a href="">Lainnya</a>
                        <ul>
                            <li class="<?= $souvenir; ?>">
                                <a class="<?= $text_souvenir; ?>" href="souvenir.php" title="Souvenir IKAITL">Souvenir IKAITL</a>
                            </li>
                            <li class="<?= $umkm; ?>">
                                <a class="<?= $text_umkm; ?>" href="umkm.php" title="UKM / UMKM">UKM / UMKM</a>
                            </li>
                            <li class="<?= $bisnis_alumni; ?>">
                                <a class="<?= $text_bisnis_alumni; ?>" href="bisnis_alumni.php" title="Bisnis Alumni">Bisnis Alumni</a>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['Level'])) { ?>
                        <li class="ml-4">
                            <a class="" href="logout" title="Keluar" style="color: red">Keluar</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a class="" href=""></a>
                        </li>
                    <?php } ?>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->