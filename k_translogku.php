<?php $menu = 'kegiatan_alumni' ?>
<?php include "header2.php" ?>


<main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Translogku</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="kegiatan_alumni.php">Komunitas Alumni</a></li>
                    <li>Translogku</li>
                </ol>
            </div>

        </div>
    </section><!-- End Contact Section -->

    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/club/SlideIMG/TRANSLOGKU 2.jpg" class="img-fluid" alt="" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Team Section -->

    <!-- ======= Team Section ======= -->
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-5" style=" height: 700px; width: 100%; overflow-y: scroll;">
                    <div class="card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT1.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray;" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT2.jpg" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT3.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT4.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT5.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT6.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT7.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT8.jpg" alt="" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="column">
                                    <img src="assets/img/KPPMTT9.jpg" style="width:100%; height: 100%; padding: 8px; background-color:darkgray; border: 2px" onclick="myFunction(this);" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card" style="height: 100%;;width: 100%" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card" style=" height: 700px; width: 100%; overflow-y: scroll;">
                            <div class="card-body">
                                <span onclick="this.parentElement.style.display='none'" class="closebtn float-right" style="color: red;"><i class="fa fa-times" aria-hidden="true"></i></span>
                                <img id="expandedImg" style="width:100%; margin-top: 20px">
                                <div id="imgtext"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    $sqlIklan = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan K Translogku 1'");
                    while($dataIklan = mysqli_fetch_array($sqlIklan)) {
                    ?>
                        <div class="col-lg-6 video-box">
                            <img src="admin/img/Iklan/<?= $dataIklan['gambar']?>" class="img-fluid" alt="" style="height: 300px; width: 100%">
                        </div>
                    <?php } ?>
                    
                    <?php
                    $sqlIklan = mysqli_query($konek, "SELECT * FROM iklan WHERE Penempatan_Iklan = 'Iklan K Translogku 2'");
                    while($dataIklan = mysqli_fetch_array($sqlIklan)) {
                    ?>
                        <div class="col-lg-6 video-box">
                            <img src="admin/img/Iklan/<?= $dataIklan['gambar']?>" class="img-fluid" alt="" style="height: 300px; width: 100%">
                        </div>
                    <?php } ?>
                </row>
            </div>
        </div>

    </div>

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" role="form">
                        <h1 class="text-center">Form Pendaftaran Keanggotaan</h1>
                        <div class="form-row mt-4">
                            <div class="col-md-6 form-group">
                                <input type="text" name="nama" class="form-control" autocomplete="off" id="name" placeholder="Nama Lengkap"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <select name="tahun_masuk" class="form-control">
                                    <option selected disabled>-- Pilih Tahun Masuk Kuliah --</option>
                                    <?php
                                    for ($i = date('Y'); $i >= date('Y') - 51; $i -= 1) {
                                    ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="tahun_lulus" class="form-control">
                                    <option selected disabled>-- Pilih Tahun Wisuda Kuliah --</option>
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

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <select name="fakultas" class="form-control">
                                    <option selected disabled>-- Pilih Fakultas / Jurusan --</option>
                                    <option class="font-weight-bold" disabled>Jenjang Pendidikan Diploma Tiga (D.III)</option>
                                    <option> Program Studi Manajemen Transpor Udara (MTU)</option>
                                    <option> Program Studi Manajemen Transpor Laut (MTL)</option>
                                    <option> Program Studi Manajemen Logistik dan Material (MLM)</option>
                                    <option disabled><br></option>
                                    <option class="font-weight-bold" disabled>Jenjang Pendidikan Strata Satu (S.I)</option>
                                    <option> Manajemen Transportasi Udara (MTU)</option>
                                    <option> Manajemen Transportasi Darat (MTD)</option>
                                    <option> Manajemen Transportasi Laut (MTL)</option>
                                    <option> Manajemen Logistik dan Material (MLM)</option>
                                    <option> Teknik Dirgantara (Kebandarudaraan)</option>
                                    <option> Teknik Kelautan (Kepelabuhanan)</option>
                                    <option> Teknik Rekayasa Infrastruktur dan Lingkungan (Perkeretaapian)</option>
                                    <option> Transportasi</option>
                                    <option> Logistik</option>
                                    <option disabled><br></option>
                                    <option class="font-weight-bold" disabled>Jenjang Pendidikan Strata Dua (S.2)</option>
                                    <option> Program Pasca Sarjana Magister Manajemen</option>
                                    <option> Konsentrasi Magister Manajemen Transportasi Udara</option>
                                    <option> Konsentrasi Magister Manajemen Transportasi Darat</option>
                                    <option> Konsentrasi Magister Manajemen Transpor Laut</option>
                                    <option> Konsentrasi Magister Manajemen Transportasi Logistik</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="no_hp" class="form-control" id="no_hp" autocomplete="off" placeholder="No Hp / WA"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-10 form-group">
                                <input type="text" name="alamat" class="form-control" autocomplete="off" id="alamat" placeholder="Alamat"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-2 form-group">
                                <input type="text" class="form-control" name="kode_pos" autocomplete="off" id="kode_pos" placeholder="Kode Pos"/>
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="provinsi" class="form-control">
                                <option selected disabled>-- Provinsi --</option>
                                <option>Aceh</option>
                                <option>Sumatera Utara</option>
                                <option>Sumatera Barat</option>
                                <option>Riau</option>
                                <option>Kepulauan Riau</option>
                                <option>Jambi</option>
                                <option>Sumatera Selatan</option>
                                <option>Kepulauan Bangka Belitung</option>
                                <option>Bengkulu</option>
                                <option>Lampung</option>
                                <option>DKI Jakarta</option>
                                <option>Banten</option>
                                <option>Jawa Barat</option>
                                <option>Jawa Tengah</option>
                                <option>DI Yogyakarta</option>
                                <option>Jawa Timur</option>
                                <option>Bali</option>
                                <option>Nusa Tenggara Barat</option>
                                <option>Nusa Tenggara Timur</option>
                                <option>Kalimantan Barat</option>
                                <option>Kalimantan Tengah</option>
                                <option>Provinsi Kalimantan Selatan</option>
                                <option>Kalimantan Timur</option>
                                <option>Kalimantan Utara</option>
                                <option>Sulawesi Utara</option>
                                <option>Gorontalo</option>
                                <option>Sulawesi Tengah</option>
                                <option>Sulawesi Barat</option>
                                <option>Provinsi Sulawesi Selatan</option>
                                <option>Sulawesi Tenggara</option>
                                <option>Maluku</option>
                                <option>Maluku Utara</option>
                                <option>Papua Barat</option>
                                <option>Papua</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="nama_komunitas" value="Translogku" class="form-control" id="alamat" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="tanggal" value="<?= $date->format('d F Y, H:i:s A'); ?>" class="form-control" id="alamat" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary mr-2">Kirim</button></div>
                    </form>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $tahun_masuk = $_POST['tahun_masuk'];
                        $tahun_lulus = $_POST['tahun_lulus'];
                        $nama_komunitas = $_POST['nama_komunitas'];
                        $fakultas = $_POST['fakultas'];
                        $telp = $_POST['no_hp'];
                        $tanggal = $_POST['tanggal'];
                        $alamat = $_POST['alamat'];
                        $kode_pos = $_POST['kode_pos'];
                        $provinsi = $_POST['provinsi'];

                        // var_dump($gambar);
                        //simpan data simpanan
                        $simpan = mysqli_query(
                            $konek,
                            "INSERT INTO komunitas
                                    (`Nama`, `Email`, `Tahun_Masuk`, `Tahun_Wisuda`, `Nama_Komunitas`, `Fakultas`, `No_Telp`, `Alamat`, `Tanggal` ,`Kode_Pos`, `Provinsi`)
                                    VALUES('$nama','$email', '$tahun_masuk', '$tahun_lulus', '$nama_komunitas', '$fakultas', '$telp', '$alamat', '$tanggal', '$kode_pos', '$provinsi')"
                        );
                        // var_dump($simpan);

                        if ($simpan) {
                            echo "<script>alert('data berhasil ditambahkan');</script>";
                            echo "<script>document.location.href = 'k_komunitas_basket.php'; </script>";
                        } else {
                            echo "<div class='alert alert-warning fade show alert-dismissible mt-2'>
                                Data gagal ditambahkan !!!
                                </div>";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php include "footer.php" ?>