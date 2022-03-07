<?php $menu = 'iklan' ?>
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


                                    move_uploaded_file($tmpName, 'img/Iklan/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }

                                $namaIklan          = $_POST['Nama_Iklan'];
                                $penempatanIklan    = $_POST['Penempatan_Iklan'];
                                $tanggal            = $_POST['Tanggal'];
                                $gambar             = upload();
                                if (!$gambar) {
                                    return false;
                                }

                                if ($namaIklan == '' ) {
                                    echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                    Data Belum lengkap !!!
                                </div>";
                                } else {

                                    //simpan data Panduan
                                    $simpan = mysqli_query(
                                        $konek,
                                        "INSERT INTO iklan (`Nama_Iklan`, `Penempatan_Iklan`, `Tanggal`, `gambar`) 
                                        VALUES ('$namaIklan', '$penempatanIklan', '$tanggal', '$gambar')"
                                    );

                                    if ($simpan) {
                                        echo "<script>document.location.href = 'iklan.php';</script>";
                                    }
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Iklan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama_Iklan" id="" placeholder="Nama Iklan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $date->format('d F Y'); ?>" class="form-control" name="Tanggal" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penempatan Iklan</label>
                                <div class="col-sm-9">
                                    <select name="Penempatan_Iklan" class="form-control" required>
                                        <option value="0" selected disabled>-- Pilih Tata Letak Iklan --</option>
                                        <option>Baner Utama</option>
                                        <option>Iklan 1</option>
                                        <option>Iklan 2</option>
                                        <option>Iklan 3</option>
                                        <option>Iklan 4</option>
                                        <option>Iklan 5</option>
                                        <option>Iklan UMKM 1</option>
                                        <option>Iklan UMKM 2</option>
                                        <option>Iklan K Biker 1</option>
                                        <option>Iklan K Biker 2</option>
                                        <option>Iklan K Basket 1</option>
                                        <option>Iklan K Basket 2</option>
                                        <option>Iklan K Futsal 1</option>
                                        <option>Iklan K Futsal 2</option>
                                        <option>Iklan K Golf 1</option>
                                        <option>Iklan K Golf 2</option>
                                        <option>Iklan K Litbang 1</option>
                                        <option>Iklan K Litbang 2</option>
                                        <option>Iklan K Seni 1</option>
                                        <option>Iklan K Seni 2</option>
                                        <option>Iklan K Sepeda 1</option>
                                        <option>Iklan K Sepeda 2</option>
                                        <option>Iklan K Kopai 1</option>
                                        <option>Iklan K Kopai 2</option>
                                        <option>Iklan K KPMIT 1</option>
                                        <option>Iklan K KPMIT 2</option>
                                        <option>Iklan K Kupat 1</option>
                                        <option>Iklan K Kupat 2</option>
                                        <option>Iklan K Translogku 1</option>
                                        <option>Iklan K Translogku 2</option>
                                    </select>
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
                            <button class="btn btn-light"><a href="iklan.php">Cancel</a></button>
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