<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM news WHERE ID_News='$_GET[ID_News]'");

    $fileName = $_GET['gambar'];
	unlink('img/News/'.$fileName);
	
header('location:news.php');
