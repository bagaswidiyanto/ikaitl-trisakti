<?php $menu = 'gambar_komunitas' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM gambar_komunitas WHERE ID_Gambar_Komunitas='$_GET[ID_Gambar_Komunitas]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_Gambar_Komunitas" value="<?= $e['ID_Gambar_Komunitas']; ?>" />
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


                                    move_uploaded_file($tmpName, 'img/GambarKomunitas/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idGambarKomunitas  = $_POST['ID_Gambar_Komunitas'];
                                $namaKomunitas      = $_POST['Nama_Komunitas'];
                                $link               = $_POST['Link'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/GambarKomunitas/' . $gambarLama);
                                    $gambar = upload();
                                };

                                $edit = mysqli_query($konek, "UPDATE gambar_komunitas SET 
                                                                    Nama_Komunitas='$namaKomunitas',
                                                                    Link='$link',
                                                                    Tanggal='$tanggal', 
                                                                    gambar='$gambar' 
                                                                WHERE ID_Gambar_Komunitas='$idGambarKomunitas'");

                                if (!$edit) {
                                    echo "
                                        <script>
                                        alert('data loker gagal diupdate');
                                        document.location.href = 'gambar_komunitas_edit.php';
                                        </script>
                                        ";
                                } else {
                                    echo "
                                        <script>
                                        document.location.href = 'gambar_komunitas.php';
                                        </script>
                                        ";
                                }
                            }
                            ?>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Komunitas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama_Komunitas" id="" value="<?= $e['Nama_Komunitas']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Link" id="" value="<?= $e['Link']; ?>" required>
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
                                    <img src="img/GambarKomunitas/<?= $e['gambar']; ?>" width="200"><br>
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