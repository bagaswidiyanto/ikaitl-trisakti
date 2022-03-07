<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM video WHERE ID_Video='$_GET[ID_Video]'");

$fileName = $_GET['Video'];
	unlink('img/Video/'.$fileName);

header('location:video.php');
