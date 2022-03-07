<?php
require_once __DIR__ . '/vendor/autoload.php';

include "koneksi.php";

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cetak.css">
    <title>Document</title>
    
</head>
<body>
    <h1>Anggota</h1>
    <hr>';
$sqlAnggota = mysqli_query($konek, "SELECT * FROM anggota WHERE ID_Anggota='$_GET[ID_Anggota]'");
$da = mysqli_fetch_array($sqlAnggota);
$html .= '<section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
<div class="container">

  <div class="row">

    <div class="col-lg-6 entries">
      <div class="card img-fluid" style="width:500px">
        <img class="card-img-top" src="assets/img/KTA-DEPAN.jpg" alt="Card image" style="width:100%">
        <div class="card-img-overlay">
          <table class="table-img" style="border-collapse: collapse;">
            <tr align="center">
              <th width="230"></th>
              <th><img src="assets/img/profil/' . $da['gambar'] . '" style="width: 130px; height: 130px ; border-radius: 4em;"></th>
            </tr>
            <tr align="center">
              <td></td>
              <td><strong>' . $da['Nama'] . '</strong></td>
            </tr>
            <tr align="center">
              <td></td>
              <td>
                <h5>' . $da['NIA'] . '</h5>
              </td>
            </tr>
          </table>
        </div>
        <img class="card-img-top" src="assets/img/KTA-BELAKANG.jpg" alt="Card image" style="width:100%; margin-top: 50px">
      </div>

    </div><!-- End blog entries list -->

  </div><!-- End .row -->

</div><!-- End .container -->

</section><!-- End Blog Section -->
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
