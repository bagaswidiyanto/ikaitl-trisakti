<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM gambar_komunitas WHERE ID_Gambar_Komunitas='$_GET[ID_Gambar_Komunitas]'");

$fileName = $_GET['gambar'];
	unlink('img/GambarKomunitas/'.$fileName);

header('location:gambar_komunitas.php');
