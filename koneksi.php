<?php
//variabel koneksi
$konek = mysqli_connect("localhost", "root", "", "ika_itl_trisakti");

if (!$konek) {
    echo "Koneksi Database Gagal...!!!";
}
