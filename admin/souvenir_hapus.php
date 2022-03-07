<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM souvenir WHERE ID_Souvenir='$_GET[ID_Souvenir]'");

$fileName = $_GET['gambar'];
	unlink('img/Souvenir/'.$fileName);

header('location:souvenir.php');
