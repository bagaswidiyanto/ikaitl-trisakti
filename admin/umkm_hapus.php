<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM umkm WHERE ID_UMKM='$_GET[ID_UMKM]'");

$fileName = $_GET['gambar'];
	unlink('img/UMKM/'.$fileName);

header('location:umkm.php');
