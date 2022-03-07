<?php $menu = 'video' ?>
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
                                    $ekstensiGambarValid = ["mp4", "avi", "3gp", "mov", "mpeg"];
                                    $ekstensiGambar = explode('.', $namaFile);
                                    $ekstensiGambar = strtolower(end($ekstensiGambar));
                                    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
                                        echo "<script>
                                                alert('yang anda upload bukan gambar!');
                                            </script>";
                                        return false;
                                    }

                                    // cek ika ukurannya terlalu besar 
                                    if ($ukuranFile > 100000000) {
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


                                    move_uploaded_file($tmpName, 'img/Video/' . $namaFileBaru);


                                    return $namaFileBaru;
                                }

                                $judul              = $_POST['Judul'];
                                $isi                = $_POST['Isi'];
                                $video             = upload();
                                if (!$video) {
                                    return false;
                                }
                                $tanggal            = $_POST['Tanggal'];


                                    //simpan data Panduan
                                    $simpan = mysqli_query(
                                        $konek,
                                        "INSERT INTO video (`Judul`, `Isi`, `Video`, `Tanggal`) 
                                        VALUES ('$judul', '$isi', '$video', '$tanggal')"
                                    );

                                    if ($simpan) {
                                        echo "<script>document.location.href = 'video.php';</script>";
                                    }
                                    
                                   
                                    
                            
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Bisnis</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Judul" id="" placeholder="Nama Bisnis" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Isi Berita</label>
                                <div class="col-sm-9">
                                    <textarea name="Isi" cols="80" rows="8" class="summernote" required></textarea>
                                </div> 
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input width="30" type="file" name="gambar" id="gambar" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $date->format('d F Y'); ?>" class="form-control" name="Tanggal" readonly>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light"><a href="berita.php">Cancel</a></button>
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