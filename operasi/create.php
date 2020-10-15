<?php 
require 'config.php';

$nimErr = $namaErr = $usernameErr = $passwordErr = $emailErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nim']) || !isset($_POST['nama']) || !isset($_POST['username']) || !isset($_POST['password']) || !$_POST['email']){
		if($_POST['nim'] == ""){
			$nimErr = "nim tidak boleh kosong!";
		}
		if($_POST['nama'] == ""){
			$namaErr = "Nama tidak boleh kosong!";
		}
		if($_POST['username'] == ""){
			$usernameErr = "Username tidak boleh kosong!";
		}
		if($_POST['password'] == ""){
			$passwordErr = "Password tidak boleh kosong!";
		}
		if($_POST['email'] == ""){
			$emailErr = "Email tidak boleh kosong!";
		}
	}else{
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$query = "INSERT INTO mahasiswa (nim, nama,username,password,email) VALUES('$nim','$nama', '$username', '$password', '$email')";
		if (mysqli_query($connect, $query)) {
			$_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data berhasil ditambahkan</div>";
			header("location:".$WEB_CONFIG['base_url']."index.php");
		}else{
			$_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal ditambahkan</div>";
			header("location:".$WEB_CONFIG['base_url']."index.php");
		}
	}
}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
		<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama">NIM</label>
			<input type="number" name="nim" class="form-control" id="inputNama" maxlength="11"  autofocus >
			<small class="text-danger"><?= $nimErr == "" ? "":"* $nimErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputNama">Nama</label>
			<input type="text" name="nama" class="form-control" id="inputNama" maxlength="40"  autofocus>
			<small class="text-danger"><?= $namaErr == "" ? "":"* $namaErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputUsername">Username</label>
			<input type="username" name="username" class="form-control" id="inputUsername" maxlength="30" >
			<small class="text-danger"><?= $usernameErr == "" ? "":"* $usernameErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputPassword">Password</label>
			<input type="password" name="password" class="form-control" id="inputPassword" maxlength="30" minlength="3" >
			<small class="text-danger"><?= $passwordErr == "" ? "":"* $passwordErr" ?></small>
		</div>
		<div class="form-group">
			<label for="inputEmail">Email</label>
			<input type="text" name="email" class="form-control" id="inputEmail" maxlength="50" >
			<small class="text-danger"><?= $emailErr == "" ? "":"* $emailErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
	</form>
</div>
