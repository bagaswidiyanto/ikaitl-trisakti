<?php include "koneksi.php";

session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}

$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin IKAITL Trisakti</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/logo.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="plugins/c3/c3.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="dist/css/theme.min.css">
    <script src="src/js/vendor/modernizr-2.8.3.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
</head>

<body>

    <div class="wrapper">
        <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>

                        </div>
                        <div class="top-menu d-flex align-items-center">
            
                            <div class="dropdown">
                                    <a class="dropdown-item text-red" href="logout.php" title="Keluar" onclick="return confirm('Anda yakin ingin keluar?');"><i class="ik ik-power dropdown-icon"></i> Keluar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="#">
                        <div class="logo-img">
                            <img src="img/logo.png" style="width: 30px" class="header-brand-img" alt="lavalite">
                        </div>
                        <span class="text">IKAITL</span>
                    </a>
                    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <?php
                        if ($menu == 'index') {
                            $index        = 'active';
                            $text_index   = 'text-danger';
                        } else if ($menu == 'anggota') {
                            $anggota      = 'active';
                            $text_anggota = 'text-danger';
                        } else if ($menu == 'berita') {
                            $berita       = 'active';
                            $text_berita  = 'text-danger';
                        } else if ($menu == 'loker') {
                            $loker        = 'active';
                            $text_loker   = 'text-danger';
                        } elseif ($menu == 'komunitas') {
                            $perkumpulan      = "active open";
                            $text_komunitas   = "text-danger";
                            $komunitas        = "active";
                        } elseif ($menu == 'gambar_komunitas') {
                            $perkumpulan        = "active open";
                            $text_komunitas     = "text-danger";
                            $gambar_komunitas   = "active";
                        }elseif ($menu == 'umkm') {
                            $bisnis         = "active open";
                            $text_bisnis    = "text-danger";
                            $umkm           = "active";
                        } elseif ($menu == 'bisnis_alumni') {
                            $bisnis         = "active open";
                            $text_bisnis    = "text-danger";
                            $bisnis_alumni  = "active";
                        }else if ($menu == 'souvenir') {
                            $souvenir      = 'active';
                            $text_souvenir = 'text-danger';
                        } else if ($menu == 'news') {
                            $news         = 'active';
                            $text_news    = 'text-danger';
                        } else if ($menu == 'iklan') {
                            $iklan         = 'active';
                            $text_iklan    = 'text-danger';
                        } else if ($menu == 'video') {
                            $video         = 'active';
                            $text_video    = 'text-danger';
                        }
                        ?>
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div class="nav-lavel">Navigation</div>
                            <div class="nav-item <?= $index; ?>">
                                <a href="index.php" class="<?= $text_index; ?>"><i class="ik ik-bar-chart-2 <?= $text_index; ?> "></i><span>Dashboard</span></a>
                            </div>
                            
                            <div class="nav-item <?= $anggota; ?>">
                                <a href="anggota.php" class="<?= $text_anggota; ?>"><i class="ik ik-users <?= $text_anggota; ?>"></i><span>Anggota</span></a>
                            </div>
                            
                            <div class="nav-item <?= $berita; ?>">
                                <a href="berita.php" class="<?= $text_berita; ?>"><i class="ik ik-layers <?= $text_berita; ?>"></i><span>Berita</span></a>
                            </div>
                            
                            <div class="nav-item <?= $news; ?>">
                                <a href="news.php" class="<?= $text_news; ?>"><i class="ik ik-layers <?= $text_news; ?>"></i><span>IKAITL News</span></a>
                            </div>
                            
                            <div class="nav-item <?= $loker; ?>">
                                <a href="lowongan_kerja.php" class="<?= $text_loker; ?>"><i class="ik ik-file-text <?= $text_loker; ?>"></i><span>Lowongan Kerja</span></a>
                            </div>
                            
                            <div class="nav-item has-sub <?= $perkumpulan; ?>">
                                <a href="javascript:void(0)" class="<?= $text_komunitas; ?>"><i class="ik ik-life-buoy"></i><span>Komunitas</span></a>
                                <div class="submenu-content">
                                    <a href="komunitas.php" class="menu-item <?= $komunitas; ?>">Komunitas</a>
                                    <a href="gambar_komunitas.php" class="menu-item <?= $gambar_komunitas; ?>">Gambar Komunitas</a>
                                </div>
                            </div>
                            
                            <div class="nav-item has-sub <?= $bisnis; ?>">
                                <a href="javascript:void(0)" class="<?= $text_bisnis; ?>"><i class="ik ik-shopping-cart"></i><span>Bisnis</span></a>
                                <div class="submenu-content">
                                    <a href="umkm.php" class="menu-item <?= $umkm; ?>">UMKM</a>
                                    <a href="bisnis_alumni.php" class="menu-item <?= $bisnis_alumni; ?>">Bisnis Alumni</a>
                                </div>
                            </div>
                            
                            <div class="nav-item <?= $souvenir; ?>">
                                <a href="souvenir.php" class="<?= $text_souvenir; ?>"><i class="ik ik-image <?= $text_souvenir; ?>"></i><span>Souvenir</span></a>
                            </div>
                            
                            <div class="nav-item <?= $iklan; ?>">
                                <a href="iklan.php" class="<?= $text_iklan; ?>"><i class="ik ik-image <?= $text_iklan; ?>"></i><span>Iklan</span></a>
                            </div>
                            
                            <div class="nav-item <?= $video; ?>">
                                <a href="video.php" class="<?= $text_video; ?>"><i class="ik ik-image <?= $text_video; ?>"></i><span>Video</span></a>
                            </div>

                        </nav>
                    </div>
                </div>
            </div>