<?php $menu = 'loker' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="simpanan_wajib.php">Simpanan</a></li>
            <li class="breadcrumb-item no-drop active">Tambah Simpanan</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM lowongan_kerja WHERE ID_Lowongan_Kerja='$_GET[ID_Lowongan_Kerja]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_Lowongan_Kerja" value="<?= $e['ID_Lowongan_Kerja']; ?>" />
                            <input type="hidden" name="gambarLama" value="<?= $e['gambar']; ?>" />
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                // Upload
                                function upload()
                                {

                                    $namaFile = $_FILES['gambar']['name'];
                                    $ukuranFile = $_FILES['gambar']['size'];
                                    $error = $_FILES['gambar']['error'];
                                    $tmpName = $_FILES['gambar']['tmp_name'];

                                    // cek apakah tidak ada gambar yang diupload
                                    if ($error === 4) {
                                        echo "<script>
                                                        alert('Pilih gambar terlebih dahulu!');
                                                    </script>";
                                        return false;
                                    };

                                    // cek apakah yang diupload adalah gambar
                                    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
                                    $ekstensiGambar = explode('.', $namaFile);
                                    $ekstensiGambar = strtolower(end($ekstensiGambar));
                                    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                                        echo "<script>
                                                        alert('yang anda upload bukan gambar!');
                                                    </script>";
                                        return false;
                                    }

                                    // cek ika ukurannya terlalu besar 
                                    if ($ukuranFile > 10000000) {
                                        echo "<script>
                                                        alert('ukuran gambar terlalu besar!');
                                                    </script>";
                                        return false;
                                    }


                                    // jika lolos pengecekan, gambar siap diupload
                                    // generate nama gambar baru
                                    $namaFileBaru = uniqid();
                                    $namaFileBaru .= '.';
                                    $namaFileBaru .= $ekstensiGambar;


                                    move_uploaded_file($tmpName, 'img/LowonganKerja/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idLowonganKerja    = $_POST['ID_Lowongan_Kerja'];
                                $kota               = $_POST['Kota'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/LowonganKerja/' . $gambarLama);
                                    $gambar = upload();
                                };

                                if ($kota == '') {
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color:red;'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            Data Belum lengkap!!!
                                        </div>";
                                } else {
                                    //proses edit data guru
                                    $edit = mysqli_query($konek, "UPDATE lowongan_kerja SET 
																	Kota='$kota', 
																	Tanggal='$tanggal', 
																	gambar='$gambar' 
																WHERE ID_Lowongan_Kerja='$idLowonganKerja'");

                                    if (!$edit) {
                                        echo "
                                                <script>
                                                alert('data loker gagal diupdate');
                                                document.location.href = 'lowongan_kerja_edit.php';
                                                </script>
                                                ";
                                    } else {
                                        echo "
                                                <script>
                                                document.location.href = 'lowongan_kerja.php';
                                                </script>
                                                ";
                                    }
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kota Loker</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Kota']; ?>" name="Kota" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Tanggal']; ?>" name="Tanggal" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="img/LowonganKerja/<?= $e['gambar']; ?>" width="200"><br>
                                    <input style="margin-top: 10px" type="file" name="gambar" id="gambar">
                                </div>
                            </div>


                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>