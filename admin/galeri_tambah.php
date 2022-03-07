<?php $menu = 'galeri' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
                                    if ($ukuranFile > 1000000) {
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

                                $harga              = $_POST['Harga'];
                                $noTelp             = $_POST['No_Telp'];
                                $gambar             = upload();
                                if (!$gambar) {
                                    return false;
                                }

                                //simpan data Panduan
                                $simpan = mysqli_query(
                                    $konek,
                                    "INSERT INTO souvenir (`Harga`, `No_Telp`, `gambar`) 
                                        VALUES ('$harga', '$noTelp', '$gambar')"
                                );

                                if ($simpan) {
                                    echo "<script>document.location.href = 'souvenir.php';</script>";
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Harga Produk</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="Harga" id="" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text" value="087820595612" class="form-control" name="No_Telp" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <img src="#" id="v_gambar" alt="Preview Gambar" width="200"><br>
                                    <input width="30" type="file" name="gambar" id="gambar" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light"><a href="galeri.php">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
<script type="text/javascript">
    $(document).ready(function() {

        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#v_gambar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#gambar").change(function() {
            bacaGambar(this);
        });
    })
</script>