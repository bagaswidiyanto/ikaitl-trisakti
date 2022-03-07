<?php $menu = 'tentang_alumni' ?>
<?php include "header2.php" ?>
<?php
session_start();
$timeout = 10; // setting timeout dalam menit
$logout = "index.php"; // redirect halaman logout

$timeout = $timeout * 60; // menit ke detik
if (isset($_SESSION['start_session'])) {
  $elapsed_time = time() - $_SESSION['start_session'];
  if ($elapsed_time >= $timeout) {
    session_destroy();
    echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
  }
}

$_SESSION['start_session'] = time();
?>
<main id="main">
  <?php
  $dtanggota = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_Anggota='$_SESSION[ID_Anggota]'");
  $da     = mysqli_fetch_array($dtanggota);
  ?>
  <!-- ======= Blog Section ======= -->
  <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">

      <div class="row">

        <div class="col-lg-6 entries">
          <div class="card img-fluid" style="width:500px">
            <img class="card-img-top" src="assets/img/KTA-DEPAN.jpg" alt="Card image" style="width:100%">
            <div class="card-img-overlay">
                <style>
                    table tr th {
                        width: 140px;
                    }
                    
                    table tr td strong {
                        font-size: 14px;
                    }
                    table tr td h5 {
                        font-size: 14px;
                    }
                    
                    table tr th img {
                        margin-top: 65px; 
                        margin-left: 30px;
                        width: 90px; 
                        height: 90px; 
                        border-radius: 50%;
                    }
                    @media (min-width: 992px) {
                        table tr th img {
                            margin-top: 90px; 
                            margin-left: 30px;
                            width: 130px; 
                            height: 130px; 
                            border-radius: 50%;
                        }
                        
                        table tr th {
                            width: 200px;
                        }
                        
                        table tr td strong {
                            font-size: 20px;
                        }
                        
                        table tr td h5 {
                            font-size: 20px;
                        }
                    }
                </style>
              <table style="border-collapse: collapse;">
                <tr align="center">
                  <th></th>
                  <th><img src="assets/img/profil/<?= $da['gambar'] ?>" style="" alt="..."></th>
                </tr>
                <tr align="center">
                  <td></td>
                  <td><strong><?= $da['Nama']; ?></strong></td>
                </tr>
                <tr align="center">
                  <td></td>
                  <td>
                    <h5><?= $da['NIA']; ?></h5>
                  </td>
                </tr>
              </table>
            </div>
            <img class="card-img-top" src="assets/img/KTA-BELAKANG.jpg" alt="Card image" style="width:100%; margin-top: 20px">
          </div>

        </div><!-- End blog entries list -->

        <div class="col-lg-6">
          <div class="sidebar">
            <a href="cetak_kartu_anggota?ID_Anggota=<?= $da['ID_Anggota'] ?>" title="Cetak" target="_blank">
              <button class="btn btn-info">
                <i class='fa fa-print'></i>
                Cetak
              </button>
            </a>
            <br>
            <br>
            <br>
            <p>1. berfungsi sebagai kartu anggota alumni</p>
            <p>2. sebagai privalege card (kartu diskon)</p>
            <p>3. sebagai database untuk perubahan dari kartu virtual menjadi kartu fisik</p>
            <p>4. bisa terintegrasi dengan website IKAITL Trisakti</p>
          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div><!-- End .row -->

    </div><!-- End .container -->

  </section><!-- End Blog Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>