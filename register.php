<?php
include "koneksi.php";

$timezone = new DateTimeZone('Asia/Jakarta');
$date = new DateTime();
$date->setTimeZone($timezone);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Registrasi IKAITL Trisakti</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/img/LOGO-ITL-TRANSPARAN.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css_login/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css_login/main.css">
	<!--===============================================================================================-->



	<style>
		#profileDisplay {
			display: block;
			width: 15%;
			margin: 10px auto;
			border-radius: 20px;
			float: left;
		}
		
		.notice {
		    line-height: 0; 
		    margin-left: 10px; 
		    font-size: 8px
		}
		
		@media (min-width: 992px) {
		    .notice {
    		    line-height: 0; 
    		    margin-left: 10px; 
    		    font-size: 12px
		    }
		}
	</style>
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/polos.jpg');">
			<div class="wrap-login100">

				<form method="post" action="" class="login100-form validate-form" enctype="multipart/form-data">
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
										document.location.href = 'register.php?tambah=pilih';
									</script>";
								return false;
							};

							// cek apakah yang diupload adalah gambar
							$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
							$ekstensiGambar = explode('.', $namaFile);
							$ekstensiGambar = strtolower(end($ekstensiGambar));
							if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
								echo "<script>
										document.location.href = 'register.php?tambah=gambar';
									</script>";
								return false;
							}

							// cek jika ukurannya terlalu besar 
							if ($ukuranFile > 2000000) {
								echo "<script>
										 document.location.href = 'register.php?tambah=ukuran';
									</script>";
								return false;
							}


							// jika lolos pengecekan, gambar siap diupload
							// generate nama gambar baru
							$namaFileBaru = uniqid();
							$namaFileBaru .= '.';
							$namaFileBaru .= $ekstensiGambar;


							move_uploaded_file($tmpName, 'assets/img/profil/' . $namaFileBaru);


							return $namaFileBaru;
						}

						$idAnggota		= $_POST['ID_Anggota'];
						$password		= $_POST['Password'];
						$password2  	= $_POST['Password2'];
						$nama 			= $_POST['Nama'];
						$nim 			= $_POST['NIM'];
						$email 			= $_POST['Email'];
						$tahunMasuk 	= $_POST['Tahun_Masuk'];
						$tahunWisuda 	= $_POST['Tahun_Wisuda'];
						$fakultas 		= $_POST['Fakultas'];
						$telp 			= $_POST['No_Telp'];
						$alamat 		= $_POST['Alamat'];
						$kode_pos 		= $_POST['Kode_Pos'];
						$provinsi 		= $_POST['Provinsi'];
						$tanggal 		= $_POST['Tanggal_Entri'];
						$level			= $_POST['Level'];
						$perusahaan		= $_POST['Nama_Perusahaan'];
						$kota_perusahaan= $_POST['Kota_Perusahaan'];
						$jabatan		= $_POST['Jabatan'];
						$periode_dari	= $_POST['Periode_dari'];
						$periode_sampai	= $_POST['Periode_sampai'];
						$gambar             = upload();
						if (!$gambar) {
							return false;
						}

						$kalimat = $tahunMasuk;
						$sub_kalimat_masuk = substr($kalimat, 2);

						$kalimat = $tahunWisuda;
						$sub_kalimat_wisuda = substr($kalimat, 2);

						$nia = $sub_kalimat_masuk . $sub_kalimat_wisuda . $nim;



						// cek koonfirmasi password
						if ($password !== $password2) {
							echo "<script>
									   document.location.href = 'register.php?tambah=password';
									</script>";

							return false;
						}

						// enkripsi password
						$password = hash('sha1', $password);

						//simpan data angoota
						$simpan = mysqli_query(
							$konek,
							"INSERT INTO `anggota` (`ID_Anggota`,`NIA`,`Password`,`Nama`, `NIM`, `Email`, `Tahun_Masuk`, `Tahun_Wisuda`, `Fakultas`, `No_Telp`, `Alamat`, `Kode_Pos`, `Provinsi`, `Tanggal_Entri`, `Level`, `Nama_Perusahaan`, `Kota_Perusahaan`, `Jabatan_Perusahaan`, `Periode_dari`, `Periode_sampai`,  `gambar`)
							VALUES('$idAnggota', '$nia', '$password', '$nama', '$nim', '$email', '$tahunMasuk', '$tahunWisuda', '$fakultas', '$telp', '$alamat', '$kode_pos', '$provinsi', '$tanggal', '$level', '$perusahaan', '$kota_perusahaan', '$jabatan', '$periode_dari', '$periode_sampai', '$gambar')"
						);




						if ($simpan) {
							echo "<script>document.location.href = 'register.php?tambah=berhasil';</script>";
						}
						// membuat nomor induk alumni


					}
					//membuat ID Anggota
					$text1          = "KSS29";
					$query1         = mysqli_query($konek, "SELECT max(ID_Anggota) AS last1 FROM anggota WHERE ID_Anggota LIKE '$text1%'");
					$data1          = mysqli_fetch_array($query1);
					$lastNoAnggota  = $data1['last1'];
					$lastNoUrut1    = substr($lastNoAnggota, 5, 4);
					$nextNoUrut1    = $lastNoUrut1 + 1;
					$nextNoSimpanan = $text1 . sprintf('%04s', $nextNoUrut1);


					?>
					<span class="login100-form-title">
						Register
					</span>
					<?php
					if (isset($_GET['tambah'])) {
						if ($_GET['tambah'] == "berhasil") {
							echo "<div class='alert alert-primary fade show alert-dismissible mt-2' style='color: black; font-weight: bold;border-radius: 50px;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Registrasi Berhasil !
                            </div>";
						}
						if ($_GET['tambah'] == "ukuran") {
							echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color: red; font-weight: bold;border-radius: 50px;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Ukuran gambar terlalu besar!
                            </div>";
						}
						if ($_GET['tambah'] == "gambar") {
							echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color: red; font-weight: bold;border-radius: 50px;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Yang anda upload bukan gambar!
                            </div>";
						}
						if ($_GET['tambah'] == "pilih") {
							echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color: red; font-weight: bold;border-radius: 50px;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Pilih gambar terlebih dahulu!
                            </div>";
						}
					}
					?>

					<input class="input100" autocomplete="off" type="hidden" value="<?= $date->format('d F Y'); ?>" name="Tanggal_Entri" readonly>
					<input class="input100" autocomplete="off" type="hidden" name="ID_Anggota" value="<?= $nextNoSimpanan; ?>" readonly>
					<input class="input100" autocomplete="off" type="hidden" name="Level" value="Alumni" readonly>
					<div class="row row-space">
						<div class="col-8">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Nama" placeholder="Nama Lengkap" required maxlength="33">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user" aria-hidden="true"></i>
								</span>
							</div>
							<p class="notice">*: Nama Lengkap tidak boleh lebih dari 33 karakter</p>
						</div>
						<div class="col-4">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="number" name="NIM" placeholder="NIM" style="padding: 10px;" required>
							</div>
						</div>
					</div>
					<div class="row row-space mt-3">
						<div class="col-6">
							<div class="wrap-input100 validate-input">
								<input class="input100" onblur="checkLength(this)" autocomplete="off" type="password" name="Password" placeholder="Kata Sandi" minlength="6" maxlength="12" required>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							<p class="notice">*: min 6 karakter dan max 12 karakter</p>
						</div>
						
						<div class="col-6">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="password" name="Password2" placeholder="Konfirmasi Password" required>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="wrap-input100 validate-input  mt-3">
						<input class="input100" autocomplete="off" type="email" name="Email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" autocomplete="off" type="number" name="No_Telp" placeholder="Nomor Telepon" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					<div class="row row-space">
						<div class="col-6">
							<select name="Fakultas" class="input100" autocomplete="off" style="padding: 10px; margin-bottom: 10px;" >
								<option selected disabled required>-- Pilih Fakultas / Jurusan --</option>
								<option class="font-weight-bold" disabled>Jenjang Pendidikan Diploma Tiga (D.III)</option>
								<option> Program Studi Manajemen Transpor Udara (MTU)</option>
								<option> Program Studi Manajemen Transpor Laut (MTL)</option>
								<option> Program Studi Manajemen Logistik dan Material (MLM)</option>
								<option disabled><br></option>
								<option class="font-weight-bold" disabled>Jenjang Pendidikan Diploma Empat (D.IV)</option>
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
						<div class="col-3">
							<select name="Tahun_Masuk" class="input100" autocomplete="off" style="padding: 10px;">
								<option selected disabled>Tahun Masuk Kuliah</option>
								<?php
								for ($i = date('Y'); $i >= date('Y') - 51; $i -= 1) {
								?>
									<option value="<?= $i; ?>"><?= $i; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="col-3">
							<select name="Tahun_Wisuda" class="input100" autocomplete="off" style="padding: 10px;">
								<option selected disabled>Tahun Wisuda Kuliah</option>
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
					<div class="row row-space">
						<div class="col-8">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Alamat" placeholder="Alamat" required>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<div class="col-4">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" style="padding: 20px;" type="number" name="Kode_Pos" placeholder="Kode Pos" required>
							</div>
						</div>
					</div>
					<div class="wrap-input100 validate-input">
						<select name="Provinsi" class="input100" autocomplete="off" style="padding: 10px; margin-bottom: 10px;">
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
					
					<div class="row row-space">
						<div class="col-8">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Nama_Perusahaan" placeholder="Nama Perusahaan" required >
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-building" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<div class="col-4">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Kota_Perusahaan" placeholder="Kota Perusahaan" required >
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="row row-space">
						<div class="col-6">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Jabatan" placeholder="Jabatan/Posisi" style="padding: 10px;" required>
							</div>
						</div>
						<div class="col-3">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Periode_dari" placeholder="Periode Kerja Dari" style="padding: 10px;" required>
							</div>
						</div>
						<div class="col-3">
							<div class="wrap-input100 validate-input">
								<input class="input100" autocomplete="off" type="text" name="Periode_sampai" placeholder="Periode Kerja Sampai" style="padding: 10px;" required>
							</div>
						</div>
					</div>
					
					<div class="wrap-input100 validate-input mb-4">
						<img src="assets/img/download.png" onclick="triggerClick()" id="profileDisplay">
						<label for="profileImage" style="margin-top: 35px; margin-left: 10px">Profile Image</label><br>
						<label for="profileImage" style="margin-left: 10px">Max 200kb</label>
						<input type="file" name="gambar" onchange="displayImage(this)" id="profileImage" style="display:none;">
					</div>

					<?php
					if (isset($_GET['tambah'])) {
						if ($_GET['tambah'] == "kurang") {
							echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color:red; border-radius: 50px;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Data Belum lengkap !
                            </div>";
						}
						if ($_GET['tambah'] == "user") {
							echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color:red; border-radius: 50px;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Username sudah digunakan !
                            </div>";
						}
						if ($_GET['tambah'] == "password") {
							echo "<div class='alert alert-warning fade show alert-dismissible mt-2' style='color:red;'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                Password tidak sesuai !
                            </div>";
						}
					}
					?>

					<div class="container-login100-form-btn" style="padding-top: 0px;">
						<button class="login100-form-btn" type="submit" title="Daftar">
							<i class="fa fa-sign-in mr-2" aria-hidden="true"></i>
							Daftar
						</button>
					</div>

					<div class="text-center p-t-136" style="padding-top: 5px;">
						<a class="txt2" href="login.php">
							<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
							Kembali ke Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

	<script>
		// memunculkan gambar
		function triggerClick() {
			document.querySelector('#profileImage').click();
		}

		function displayImage(e) {
			if (e.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
				}
				reader.readAsDataURL(e.files[0]);
			}
		}
		
// 		function checkLength(el){
// 		    if (el.value.length !=6) {
// 		        document.getElementById("Password").innerHTML = "*: Password harus lebih dari 6 karakter dan max 12 karakter";
// 		    }
// 		}
	</script>



</body>

</html>