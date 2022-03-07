<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM anggota WHERE ID_Anggota='$_GET[ID_Anggota]'");

$fileName = $_GET['gambar'];
	unlink('../assets/img/profil/'.$fileName);

header('location:anggota.php');
