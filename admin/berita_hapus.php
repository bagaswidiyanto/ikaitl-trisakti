<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM berita WHERE ID_Berita='$_GET[ID_Berita]'");

$fileName = $_GET['gambar'];
	unlink('img/Berita/'.$fileName);

header('location:berita.php');
