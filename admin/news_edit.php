<?php $menu = 'news' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM news WHERE ID_News='$_GET[ID_News]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_News" value="<?= $e['ID_News']; ?>">
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


                                    move_uploaded_file($tmpName, 'img/News/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idNews             = $_POST['ID_News'];
                                $judulBerita        = $_POST['Judul_Berita'];
                                $isi                = $_POST['Isi'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/Souvenir/' . $gambarLama);
                                    $gambar = upload();
                                };

                                $edit = mysqli_query($konek, "UPDATE news SET 
                                                                Judul_Berita='$judulBerita',
                                                                Isi='$isi', 
                                                                Tanggal='$tanggal', 
                                                                gambar='$gambar' 
                                                            WHERE ID_News='$idNews'");

                                if (!$edit) {
                                    echo "
                                    <script>
                                    alert('data souvenir gagal diupdate');
                                    document.location.href = 'news_edit.php';
                                    </script>
                                    ";
                                } else {
                                    echo "
                                    <script>
                                    document.location.href = 'news.php';
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
                                <label for="" class="col-sm-2 col-form-label">Isi Berita</label>
                                <div class="col-sm-9">
                                    <textarea name="Isi" cols="80" rows="8" class="summernote" required><?= $e['Isi']; ?></textarea>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Tanggal']; ?>" name="Tanggal" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="img/News/<?= $e['gambar']; ?>" width="200"><br>
                                    <input style="margin-top: 10px" type="file" name="gambar" id="gambar">
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                            <script>
                                $('.summernote').summernote({
                                    placeholder: 'Masukan isi berita',
                                    tabsize: 2,
                                    height: 300,
                                    toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'underline', 'clear']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['table', ['table']],
                                        ['insert', ['link', 'picture', 'video']],
                                        ['view', ['fullscreen', 'codeview', 'help']]
                                    ]
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>