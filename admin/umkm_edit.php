<?php $menu = 'umkm' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM umkm WHERE ID_UMKM='$_GET[ID_UMKM]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_UMKM" value="<?= $e['ID_UMKM']; ?>">
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


                                    move_uploaded_file($tmpName, 'img/UMKM/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idUMKM             = $_POST['ID_UMKM'];
                                $nama               = $_POST['Nama'];
                                $linkMitra          = $_POST['Link_Mitra'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/UMKM/' . $gambarLama);
                                    $gambar = upload();
                                };

                                if ($nama == '' | $linkMitra == '') {
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    Data Belum lengkap !!!
                                </div>";
                                } else {

                                    $edit = mysqli_query($konek, "UPDATE umkm SET 
                                                                    Nama='$nama', 
                                                                    Link_Mitra='$linkMitra',
                                                                    Tanggal='$tanggal', 
                                                                    gambar='$gambar' 
                                                                WHERE ID_UMKM='$idUMKM'");

                                    if (!$edit) {
                                        echo "
                                        <script>
                                        alert('data loker gagal diupdate');
                                        document.location.href = 'umkm_edit.php';
                                        </script>
                                        ";
                                    } else {
                                        echo "
                                        <script>
                                        document.location.href = 'umkm.php';
                                        </script>
                                        ";
                                    }
                                }
                            }
                            ?>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Mitra</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama" id="" value="<?= $e['Nama']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Link Mitra</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Link_Mitra']; ?>" name="Link_Mitra" required>
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
                                    <img src="img/UMKM/<?= $e['gambar']; ?>" width="200"><br>
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