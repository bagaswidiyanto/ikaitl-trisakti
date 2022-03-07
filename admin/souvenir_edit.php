<?php $menu = 'souvenir' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                            <?php
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM souvenir WHERE ID_Souvenir='$_GET[ID_Souvenir]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_Souvenir" value="<?= $e['ID_Souvenir']; ?>">
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


                                    move_uploaded_file($tmpName, 'img/Souvenir/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }
                                // End Upload


                                //variabel dari elemen form
                                $idSouvenir         = $_POST['ID_Souvenir'];
                                $namaBarang         = $_POST['Nama_Barang'];
                                $harga              = $_POST['Harga'];
                                $noTelp             = $_POST['No_Telp'];
                                $gambarLama         = $_POST['gambarLama'];

                                // cek apakah user pilih gambar baru atau tidak
                                if ($_FILES['gambar']['error'] === 4) {
                                    $gambar = $gambarLama;
                                } else {
                                    unlink('img/Souvenir/' . $gambarLama);
                                    $gambar = upload();
                                };

                                if ($harga == '') {
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    Data Belum lengkap !!!
                                </div>";
                                } else {

                                    $edit = mysqli_query($konek, "UPDATE souvenir SET 
                                                                    Nama_Barang='$namaBarang',
                                                                    Harga='$harga', 
                                                                    No_Telp='$noTelp', 
                                                                    gambar='$gambar' 
                                                                WHERE ID_Souvenir='$idSouvenir'");

                                    if (!$edit) {
                                        echo "
                                        <script>
                                        alert('data souvenir gagal diupdate');
                                        document.location.href = 'souvenir_edit.php';
                                        </script>
                                        ";
                                    } else {
                                        echo "
                                        <script>
                                        document.location.href = 'souvenir.php';
                                        </script>
                                        ";
                                    }
                                }
                            }
                            ?>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama_Barang" id="" value="<?= $e['Nama_Barang']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Harga" id="" value="<?= $e['Harga']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="<?= $e['No_Telp']; ?>" name="No_Telp" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="img/Souvenir/<?= $e['gambar']; ?>" width="200"><br>
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