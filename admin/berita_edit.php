<?php $menu = 'berita' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM berita WHERE ID_Berita='$_GET[ID_Berita]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_Berita" value="<?= $e['ID_Berita']; ?>" />
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


                                    move_uploaded_file($tmpName, 'img/Berita/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idBerita           = $_POST['ID_Berita'];
                                $judulBerita        = $_POST['Judul_Berita'];
                                $linkBerita         = $_POST['Link_Berita'];
                                $jenisKonfigurasi   = $_POST['Jenis_Konfigurasi'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/Berita/' . $gambarLama);
                                    $gambar = upload();
                                };

                                $edit = mysqli_query($konek, "UPDATE berita SET 
                                                                    Judul_Berita='$judulBerita',
                                                                    Link_Berita='$linkBerita', 
                                                                    Jenis_Konfigurasi='$jenisKonfigurasi', 
                                                                    Tanggal='$tanggal', 
                                                                    gambar='$gambar' 
                                                                WHERE ID_Berita='$idBerita'");

                                if (!$edit) {
                                    echo "
                                        <script>
                                        alert('data loker gagal diupdate');
                                        document.location.href = 'berita_edit.php';
                                        </script>
                                        ";
                                } else {
                                    echo "
                                        <script>
                                        document.location.href = 'berita.php';
                                        </script>
                                        ";
                                }
                            }
                            ?>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Judul Berita</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Judul_Berita" id="" value="<?= $e['Judul_Berita']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Link Berita</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Link_Berita']; ?>" name="Link_Berita" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Jenis Konfigurasi</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Jenis_Konfigurasi']; ?>" name="Jenis_Konfigurasi" readonly>
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
                                    <img src="img/Berita/<?= $e['gambar']; ?>" width="200"><br>
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