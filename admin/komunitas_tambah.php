<?php $menu = 'komunitas' ?>
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

                                $nama           = $_POST['Nama'];
                                $email          = $_POST['Email'];
                                $tahunMasuk     = $_POST['Tahun_Masuk'];
                                $tahunWisuda    = $_POST['Tahun_Wisuda'];
                                $fakultas       = $_POST['Fakultas'];
                                $noTelp         = $_POST['No_Telp'];
                                $alamat         = $_POST['Alamat'];
                                $tanggal        = $_POST['Tanggal'];
                                $kodePos        = $_POST['Kode_Pos'];
                                $provinsi       = $_POST['Provinsi'];


                                //simpan data Panduan
                                $simpan = mysqli_query(
                                    $konek,
                                    "INSERT INTO komunitas (`Nama`, `Email`, `Tahun_Masuk`, `Tahun_Wisuda`, `Fakultas`, `No_Telp`, `Alamat`, `Tanggal`, `Kode_Pos`, `Provinsi`) 
                                        VALUES ('$nama', '$email', '$tahunMasuk', '$tahunWisuda', '$fakultas', '$noTelp', '$alamat', '$tanggal', '$kodePos', '$provinsi')"
                                );

                                if ($simpan) {
                                    echo "<script>document.location.href = 'komunitas.php';</script>";
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama" id="" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="Email" id="" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tahun Masuk</label>
                                <div class="col-sm-9">
                                    <select name="Tahun_Masuk" class="form-control" required>
                                        <option selected value="0" disabled>-- Pilih Tahun Masuk Kuliah --</option>
                                        <?php
                                        for ($i = date('Y'); $i >= date('Y') - 51; $i -= 1) {
                                        ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tahun Wisuda</label>
                                <div class="col-sm-9">
                                    <select name="Tahun_Wisuda" class="form-control" required>
                                        <option selected value="0" disabled>-- Pilih Tahun Masuk Kuliah --</option>
                                        <?php
                                        for ($i = date('Y'); $i >= date('Y') - 51; $i -= 1) {
                                        ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Fakultas</label>
                                <div class="col-sm-9">
                                    <select name="Fakultas" class="form-control" required>
                                        <option selected value="0" disabled>-- Pilih Fakultas / Jurusan --</option>
                                        <option class="font-weight-bold">Jenjang Pendidikan Diploma Tiga (D.III)</option>
                                        <option>Program Studi Manajemen Transpor Udara (MTU)</option>
                                        <option>Program Studi Manajemen Transpor Laut (MTL)</option>
                                        <option>Program Studi Manajemen Logistik dan Material (MLM)</option>
                                        <option><br></option>
                                        <option class="font-weight-bold">Jenjang Pendidikan Strata Satu (S.I)</option>
                                        <option>Manajemen Transportasi Udara (MTU)</option>
                                        <option>Manajemen Transportasi Darat (MTD)</option>
                                        <option>Manajemen Transportasi Laut (MTL)</option>
                                        <option>Manajemen Logistik dan Material (MLM)</option>
                                        <option>Teknik Dirgantara (Kebandarudaraan)</option>
                                        <option>Teknik Kelautan (Kepelabuhanan)</option>
                                        <option>Teknik Rekayasa Infrastruktur dan Lingkungan (Perkeretaapian)</option>
                                        <option>Transportasi</option>
                                        <option>Logistik</option>
                                        <option><br></option>
                                        <option class="font-weight-bold">Jenjang Pendidikan Strata Dua (S.2)</option>
                                        <option>Program Pasca Sarjana Magister Manajemen</option>
                                        <option>Konsentrasi Magister Manajemen Transportasi Udara</option>
                                        <option>Konsentrasi Magister Manajemen Transportasi Darat</option>
                                        <option>Konsentrasi Magister Manajemen Transpor Laut</option>
                                        <option>Konsentrasi Magister Manajemen Transportasi Logistik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">No.Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="No_Telp" id="" placeholder="No Telepon" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Alamat" id="" placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Kode_Pos" id="" placeholder="Kode Pos" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select name="Provinsi" class="form-control" required>
                                        <option selected value="0" disabled>-- Provinsi --</option>
                                        <option>Aceh</option>
                                        <option>Sumatera Utara</option>
                                        <option>Sumatera Barat</option>
                                        <option>Riau</option>
                                        <option>Kepulauan Riau</option>
                                        <option>Jambi</option>
                                        <option>Sumatera Selatan </option>
                                        <option>Kepulauan Bangka Belitung </option>
                                        <option>Bengkulu </option>
                                        <option>Lampung </option>
                                        <option>DKI Jakarta </option>
                                        <option>Banten </option>
                                        <option>Jawa Barat </option>
                                        <option>Jawa Tengah </option>
                                        <option>DI Yogyakarta </option>
                                        <option>Jawa Timur </option>
                                        <option>Bali </option>
                                        <option>Nusa Tenggara Barat </option>
                                        <option>Nusa Tenggara Timur </option>
                                        <option>Kalimantan Barat </option>
                                        <option>Kalimantan Tengah </option>
                                        <option>Provinsi Kalimantan Selatan </option>
                                        <option>Kalimantan Timur </option>
                                        <option>Kalimantan Utara </option>
                                        <option>Sulawesi Utara </option>
                                        <option>Gorontalo </option>
                                        <option>Sulawesi Tengah </option>
                                        <option>Sulawesi Barat </option>
                                        <option>Provinsi Sulawesi Selatan </option>
                                        <option>Sulawesi Tenggara </option>
                                        <option>Maluku </option>
                                        <option>Maluku Utara </option>
                                        <option>Papua Barat </option>
                                        <option>Papua </option>
                                    </select>
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