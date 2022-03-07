<?php
// get id anggota untuk proses hapus
include "koneksi.php";
$hapus = mysqli_query($konek, "DELETE FROM komunitas WHERE ID_Komunitas='$_GET[ID_Komunitas]'");

header('location:komunitas.php');
