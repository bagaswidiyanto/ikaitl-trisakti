<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM iklan WHERE ID_Iklan='$_GET[ID_Iklan]'");

$fileName = $_GET['gambar'];
	unlink('img/Iklan/'.$fileName);

header('location:iklan.php');
