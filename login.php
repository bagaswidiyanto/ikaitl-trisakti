<?php
session_start();
if (isset($_SESSION['login'])) {
	header('Location: kartu_anggota');
}
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email  	= $_POST['Email'];
	$password   = $_POST['Password'];
	$p      	= hash('sha1', $password);

	if ($email == "" || $p == "") {
		$error = true;
	} else {
		$data = mysqli_query($konek, "SELECT * FROM anggota WHERE Email ='" . $email . "' AND Password = '" . $p . "'");
		$dt = mysqli_num_rows($data);
		$dta = mysqli_fetch_assoc($data);

		if ($dt > 0) {
			// session_start();
			$_SESSION['login']    	= true;
			$_SESSION['Email'] 		= $dta['Email'];
			$_SESSION['ID_Anggota']	= $dta['ID_Anggota'];


			// cek jika user login sebagai admin
			if ($dta['Level'] == "Alumni") {

				// buat session login dan username

				$_SESSION['login']    		= 	true;
				$_SESSION['ID_Anggota']		=	$dta['ID_Anggota'];
				$_SESSION['Password']		=	$dta['Password'];
				$_SESSION['Nama']			=	$dta['Nama'];
				$_SESSION['NIM']			=	$dta['NIM'];
				$_SESSION['Email']			=	$dta['Email'];
				$_SESSION['Tahun_Masuk'] 	=	$dta['Tahun_Masuk'];
				$_SESSION['Tahun_Wisuda']	=	$dta['Tahun_Wisuda'];
				$_SESSION['No_Telp']		=	$dta['No_Telp'];
				$_SESSION['Alamat']			=	$dta['Alamat'];
				$_SESSION['Kode_Pos']		=	$dta['Kode_Pos'];
				$_SESSION['Provinsi']		=	$dta['Provinsi'];
				$_SESSION['Tanggal_Entri']	=	$dta['Tanggal_Entri'];
				$_SESSION['Level']			=	"Alumni";
				$_SESSION['gambar']			=	$dta['gambar'];

				header("location:kartu_anggota");
			} else {
				header("location:login");
				exit; //selesai
			}
		} else {
			$error = true;
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login IKAITL Trisakti</title>
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
	<link rel="stylesheet" type="text/css" href="assets/css_login/main_login.css">
	<link rel="stylesheet" type="text/css" href="assets/css_login/main_login.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/polos.jpg');">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/img/LOGO-ITL-TRANSPARAN.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="Email" placeholder="Email" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="Password" placeholder="Kata Sandi" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
					<?php if (isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert" style="border-radius: 50px">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                            <strong style="color: red; font-size: 14px">Username / Password salah</strong>
                        </div>
                    <?php endif; ?>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="assets/#">
							Username / Password?
						</a>
					</div> -->

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Buat Akun Baru
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
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

</body>

</html>