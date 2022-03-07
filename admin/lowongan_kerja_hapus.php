<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM lowongan_kerja WHERE ID_Lowongan_Kerja='$_GET[ID_Lowongan_Kerja]'");

    $fileName = $_GET['gambar'];
	unlink('img/LowonganKerja/'.$fileName);
	
header('location:lowongan_kerja.php');
