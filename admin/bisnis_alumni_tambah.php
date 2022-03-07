<?php $menu = 'bisnis' ?>
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


                                    move_uploaded_file($tmpName, 'img/BisnisAlumni/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }

                                $namaBisnis         = $_POST['Nama_Bisnis'];
                                $tanggal            = $_POST['Tanggal_Entri'];
                                $link               = $_POST['Link_Bisnis'];
                                $gambar             = upload();
                                if (!$gambar) {
                                    return false;
                                }

                                if ($namaBisnis == '' | $link == '') {
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    Data Belum lengkap !!!
                                </div>";
                                } else {

                                    //simpan data Panduan
                                    $simpan = mysqli_query(
                                        $konek,
                                        "INSERT INTO bisnis (`Nama_Bisnis`, `Link_Bisnis`, `Tanggal_Entri`, `gambar`) 
                                        VALUES ('$namaBisnis', '$link', '$tanggal', '$gambar')"
                                    );

                                    if ($simpan) {
                                        echo "<script>document.location.href = 'bisnis_alumni.php';</script>";
                                    }
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Bisnis</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama_Bisnis" id="" placeholder="Nama Bisnis" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Link Bisnis</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Link_Bisnis" id="" placeholder="Link Bisnis" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $date->format('d F Y'); ?>" class="form-control" name="Tanggal_Entri" readonly>
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
                            <button class="btn btn-light"><a href="berita.php">Cancel</a></button>
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