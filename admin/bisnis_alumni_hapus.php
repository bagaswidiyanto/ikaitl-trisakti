<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM bisnis WHERE ID_Bisnis='$_GET[ID_Bisnis]'");

$fileName = $_GET['gambar'];
	unlink('img/BisnisAlumni/'.$fileName);

header('location:bisnis_alumni.php');
