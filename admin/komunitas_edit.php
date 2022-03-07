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
                            $sqlEdit = mysqli_query($konek, "SELECT * FROM komunitas WHERE ID_Komunitas='$_GET[ID_Komunitas]'");
                            $e = mysqli_fetch_array($sqlEdit);
                            ?>
                            <input type="hidden" name="ID_Komunitas" value="<?= $e['ID_Komunitas']; ?>" />
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                $idKomunitas    = $_POST['ID_Komunitas'];
                                $nama           = $_POST['Nama'];
                                $email          = $_POST['Email'];
                                $tahunMasuk     = $_POST['Tahun_Masuk'];
                                $tahunWisuda    = $_POST['Tahun_Wisuda'];
                                $fakultas       = $_POST['Fakultas'];
                                $noTelp         = $_POST['No_Telp'];
                                $alamat         = $_POST['Alamat'];
                                $kodePos        = $_POST['Kode_Pos'];
                                $provinsi       = $_POST['Provinsi'];


                                //proses edit data guru
                                $edit = mysqli_query($konek, "UPDATE komunitas SET 
                                                                    Nama='$nama', 
                                                                    Email='$email', 
                                                                    Tahun_Masuk='$tahunMasuk', 
                                                                    Tahun_Wisuda='$tahunWisuda', 
                                                                    Fakultas='$fakultas', 
                                                                    No_Telp='$noTelp', 
                                                                    Alamat='$alamat', 
                                                                    Kode_Pos='$kodePos', 
                                                                    Provinsi='$provinsi' 
                                                                WHERE ID_Komunitas='$idKomunitas'");


                                if ($edit) {
                                    echo "<script>document.location.href = 'komunitas.php';</script>";
                                }
                            }
                            ?>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Nama" id="" value="<?= $e['Nama']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="Email" id="" value="<?= $e['Email']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Tahun Masuk</label>
                                <div class="col-sm-9">
                                    <select name="Tahun_Masuk" class="form-control" required>
                                        <option selected value="0" disabled>-- Pilih Tahun Masuk Kuliah --</option>
                                        <option value="<?= $e['Tahun_Masuk']; ?>" disabled></option>
                                        <?php
                                        for ($i = date('Y'); $i >= date('Y') - 51; $i -= 1) {
                                        ?>
                                            <option value="<?= $i; ?>" <?= $e['Tahun_Masuk'] == $i ? 'selected' : "" ?>><?= $i; ?></option>
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
                                        <option selected value="0" disabled>-- Pilih Tahun Wisuda Kuliah --</option>
                                        <option value="<?= $e['Tahun_Wisuda']; ?>" disabled></option>
                                        <?php
                                        for ($i = date('Y'); $i >= date('Y') - 51; $i -= 1) {
                                        ?>
                                            <option value="<?= $i; ?>" <?= $e['Tahun_Wisuda'] == $i ? 'selected' : "" ?>><?= $i; ?></option>
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
                                        <option value="Jenjang Pendidikan Diploma Tiga (D.III)" class="font-weight-bold" <?= $e['Fakultas'] == 'Jenjang Pendidikan Diploma Tiga (D.III)' ? 'selected' : "" ?> disabled>Jenjang Pendidikan Diploma Tiga (D.III)</option>
                                        <option value="Program Studi Manajemen Transpor Udara (MTU)" <?= $e['Fakultas'] == 'Program Studi Manajemen Transpor Udara (MTU)' ? 'selected' : "" ?>>Program Studi Manajemen Transpor Udara (MTU)</option>
                                        <option value="Program Studi Manajemen Transpor Laut (MTL)" <?= $e['Fakultas'] == 'Program Studi Manajemen Transpor Laut (MTL)' ? 'selected' : "" ?>>Program Studi Manajemen Transpor Laut (MTL)</option>
                                        <option value="Program Studi Manajemen Logistik dan Material (MLM)" <?= $e['Fakultas'] == 'Program Studi Manajemen Logistik dan Material (MLM)' ? 'selected' : "" ?>>Program Studi Manajemen Logistik dan Material (MLM)</option>
                                        <option value=""><br></option>
                                        <option value="Jenjang Pendidikan Strata Satu (S.I)" class="font-weight-bold" <?= $e['Fakultas'] == 'Jenjang Pendidikan Strata Satu (S.I)' ? 'selected' : "" ?>>Jenjang Pendidikan Strata Satu (S.I)</option>
                                        <option value="Manajemen Transportasi Udara (MTU)" <?= $e['Fakultas'] == 'Manajemen Transportasi Udara (MTU)' ? 'selected' : "" ?>>Manajemen Transportasi Udara (MTU)</option>
                                        <option value="Manajemen Transportasi Darat (MTD)" <?= $e['Fakultas'] == 'Manajemen Transportasi Darat (MTD)' ? 'selected' : "" ?>>Manajemen Transportasi Darat (MTD)</option>
                                        <option value="Manajemen Transportasi Laut (MTL)" <?= $e['Fakultas'] == 'Manajemen Transportasi Laut (MTL)' ? 'selected' : "" ?>>Manajemen Transportasi Laut (MTL)</option>
                                        <option value="Manajemen Logistik dan Material (MLM)" <?= $e['Fakultas'] == 'Manajemen Logistik dan Material (MLM)' ? 'selected' : "" ?>>Manajemen Logistik dan Material (MLM)</option>
                                        <option value="Teknik Dirgantara (Kebandarudaraan)" <?= $e['Fakultas'] == 'Teknik Dirgantara (Kebandarudaraan)' ? 'selected' : "" ?>>Teknik Dirgantara (Kebandarudaraan)</option>
                                        <option value="Teknik Kelautan (Kepelabuhanan)" <?= $e['Fakultas'] == 'Teknik Kelautan (Kepelabuhanan)' ? 'selected' : "" ?>>Teknik Kelautan (Kepelabuhanan)</option>
                                        <option value="Teknik Rekayasa Infrastruktur dan Lingkungan (Perkeretaapian)" <?= $e['Fakultas'] == 'Teknik Rekayasa Infrastruktur dan Lingkungan (Perkeretaapian)' ? 'selected' : "" ?>>Teknik Rekayasa Infrastruktur dan Lingkungan (Perkeretaapian)</option>
                                        <option value="Transportasi" <?= $e['Fakultas'] == 'Transportasi' ? 'selected' : "" ?>>Transportasi</option>
                                        <option value="Logistik" <?= $e['Fakultas'] == 'Logistik' ? 'selected' : "" ?>>Logistik</option>
                                        <option value=""><br></option>
                                        <option value="Jenjang Pendidikan Strata Dua (S.2)" class="font-weight-bold" <?= $e['Fakultas'] == 'Jenjang Pendidikan Strata Dua (S.2)' ? 'selected' : "" ?>>Jenjang Pendidikan Strata Dua (S.2)</option>
                                        <option value="Program Pasca Sarjana Magister Manajemen" <?= $e['Fakultas'] == 'Program Pasca Sarjana Magister Manajemen' ? 'selected' : "" ?>>Program Pasca Sarjana Magister Manajemen</option>
                                        <option value="Konsentrasi Magister Manajemen Transportasi Udara" <?= $e['Fakultas'] == 'Konsentrasi Magister Manajemen Transportasi Udara' ? 'selected' : "" ?>>Konsentrasi Magister Manajemen Transportasi Udara</option>
                                        <option value="Konsentrasi Magister Manajemen Transportasi Darat" <?= $e['Fakultas'] == 'Konsentrasi Magister Manajemen Transportasi Darat' ? 'selected' : "" ?>>Konsentrasi Magister Manajemen Transportasi Darat</option>
                                        <option value="Konsentrasi Magister Manajemen Transpor Laut" <?= $e['Fakultas'] == 'Konsentrasi Magister Manajemen Transpor Laut' ? 'selected' : "" ?>>Konsentrasi Magister Manajemen Transpor Laut</option>
                                        <option value="Konsentrasi Magister Manajemen Transportasi Logistik" <?= $e['Fakultas'] == 'Konsentrasi Magister Manajemen Transportasi Logistik' ? 'selected' : "" ?>>Konsentrasi Magister Manajemen Transportasi Logistik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">No.Telp</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="No_Telp" id="" value="<?= $e['No_Telp']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Alamat" id="" value="<?= $e['Alamat']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="Kode_Pos" id="" value="<?= $e['Kode_Pos']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-9">
                                    <select name="Provinsi" class="form-control" required>
                                        <option selected value="0" disabled>-- Provinsi --</option>
                                        <option value="Aceh" <?= $e['Provinsi'] == 'Aceh' ? 'selected' : "" ?>>Aceh</option>
                                        <option value="Sumatera Utara" <?= $e['Provinsi'] == 'Sumatera Utara' ? 'selected' : "" ?>>Sumatera Utara</option>
                                        <option value="Sumatera Barat" <?= $e['Provinsi'] == 'Sumatera Barat' ? 'selected' : "" ?>>Sumatera Barat</option>
                                        <option value="Riau" <?= $e['Provinsi'] == 'Riau' ? 'selected' : "" ?>>Riau</option>
                                        <option value="Kepulauan Riau" <?= $e['Provinsi'] == 'Kepulauan Riau' ? 'selected' : "" ?>>Kepulauan Riau</option>
                                        <option value="Jambi" <?= $e['Provinsi'] == 'Jambi' ? 'selected' : "" ?>>Jambi</option>
                                        <option value="Sumatera Selatan" <?= $e['Provinsi'] == 'Sumatera Selatan' ? 'selected' : "" ?>>Sumatera Selatan</option>
                                        <option value="Kepulauan Bangka Belitung" <?= $e['Provinsi'] == 'Kepulauan Bangka Belitung' ? 'selected' : "" ?>>Kepulauan Bangka Belitung</option>
                                        <option value="Bengkulu" <?= $e['Provinsi'] == 'Bengkulu' ? 'selected' : "" ?>>Bengkulu</option>
                                        <option value="Lampung" <?= $e['Provinsi'] == 'Lampung' ? 'selected' : "" ?>>Lampung</option>
                                        <option value="Banten" <?= $e['Provinsi'] == 'Banten' ? 'selected' : "" ?>>Banten</option>
                                        <option value="Jawa Barat" <?= $e['Provinsi'] == 'Jawa Barat' ? 'selected' : "" ?>>Jawa Barat</option>
                                        <option value="Jawa Tengah" <?= $e['Provinsi'] == 'Jawa Tengah' ? 'selected' : "" ?>>Jawa Tengah</option>
                                        <option value="Jawa Timur" <?= $e['Provinsi'] == 'Jawa Timur' ? 'selected' : "" ?>>Jawa Timur</option>
                                        <option value="DKI Jakarta" <?= $e['Provinsi'] == 'DKI Jakarta' ? 'selected' : "" ?>>DKI Jakarta</option>
                                        <option value="DI Yogyakarta" <?= $e['Provinsi'] == 'DI Yogyakarta' ? 'selected' : "" ?>>DI Yogyakarta</option>
                                        <option value="Bali" <?= $e['Provinsi'] == 'Bali' ? 'selected' : "" ?>>Bali</option>
                                        <option value="Nusa Tenggara Barat" <?= $e['Provinsi'] == 'Nusa Tenggara Barat' ? 'selected' : "" ?>>Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur" <?= $e['Provinsi'] == 'Nusa Tenggara Timur' ? 'selected' : "" ?>>Nusa Tenggara Timur</option>
                                        <option value="Kalimantan Barat" <?= $e['Provinsi'] == 'Kalimantan Barat' ? 'selected' : "" ?>>Kalimantan Barat</option>
                                        <option value="Kalimantan Tengah" <?= $e['Provinsi'] == 'Kalimantan Tengah' ? 'selected' : "" ?>>Kalimantan Tengah</option>
                                        <option value="Provinsi Kalimantan Selatan" <?= $e['Provinsi'] == 'Provinsi Kalimantan Selatan' ? 'selected' : "" ?>>Provinsi Kalimantan Selatan</option>
                                        <option value="Kalimantan Timur" <?= $e['Provinsi'] == 'Kalimantan Timur' ? 'selected' : "" ?>>Kalimantan Timur</option>
                                        <option value="Kalimantan Utara" <?= $e['Provinsi'] == 'Kalimantan Utara' ? 'selected' : "" ?>>Kalimantan Utara</option>
                                        <option value="Sulawesi Utara" <?= $e['Provinsi'] == 'Sulawesi Utara' ? 'selected' : "" ?>>Sulawesi Utara</option>
                                        <option value="Gorontalo" <?= $e['Provinsi'] == 'Gorontalo' ? 'selected' : "" ?>>Gorontalo</option>
                                        <option value="Sulawesi Tengah" <?= $e['Provinsi'] == 'Sulawesi Tengah' ? 'selected' : "" ?>>Sulawesi Tengah</option>
                                        <option value="Sulawesi Barat" <?= $e['Provinsi'] == 'Sulawesi Barat' ? 'selected' : "" ?>>Sulawesi Barat</option>
                                        <option value="Provinsi Sulawesi Selatan" <?= $e['Provinsi'] == 'Provinsi Sulawesi Selatan' ? 'selected' : "" ?>>Provinsi Sulawesi Selatan</option>
                                        <option value="Sulawesi Tenggara" <?= $e['Provinsi'] == 'Sulawesi Tenggara' ? 'selected' : "" ?>>Sulawesi Tenggara</option>
                                        <option value="Maluku" <?= $e['Provinsi'] == 'Maluku' ? 'selected' : "" ?>>Maluku</option>
                                        <option value="Maluku Utara" <?= $e['Provinsi'] == 'Maluku Utara' ? 'selected' : "" ?>>Maluku Utara</option>
                                        <option value="Papua Barat" <?= $e['Provinsi'] == 'Papua Barat' ? 'selected' : "" ?>>Papua Barat</option>
                                        <option value="Papua" <?= $e['Provinsi'] == 'Papua' ? 'selected' : "" ?>>Papua</option>
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