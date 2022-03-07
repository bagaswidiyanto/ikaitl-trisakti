<?php $menu = 'iklan' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM iklan WHERE ID_Iklan='$_GET[ID_Iklan]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_Iklan" value="<?= $e['ID_Iklan']; ?>" />
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


                                    move_uploaded_file($tmpName, 'img/Iklan/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idIklan            = $_POST['ID_Iklan'];
                                $namaIklan          = $_POST['Nama_Iklan'];
                                $penempatanIklan    = $_POST['Penempatan_Iklan'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/Iklan/' . $gambarLama);
                                    $gambar = upload();
                                };

                                $edit = mysqli_query($konek, "UPDATE iklan SET 
                                                                    Nama_Iklan='$namaIklan', 
                                                                    Penempatan_Iklan='$penempatanIklan', 
                                                                    Tanggal='$tanggal', 
                                                                    gambar='$gambar' 
                                                                WHERE ID_Iklan='$idIklan'");

                                if (!$edit) {
                                    echo "
                                        <script>
                                        alert('data iklan gagal diupdate');
                                        document.location.href = 'iklan_edit.php';
                                        </script>
                                        ";
                                } else {
                                    echo "
                                        <script>
                                        document.location.href = 'iklan.php';
                                        </script>
                                        ";
                                }
                            }
                            ?>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Iklan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama_Iklan" id="" value="<?= $e['Nama_Iklan']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Tanggal']; ?>" name="Tanggal" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penempatan Iklan</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['Penempatan_Iklan']; ?>" name="Penempatan_Iklan" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="img/Iklan/<?= $e['gambar']; ?>" width="200"><br>
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