<?php 
	if(isset($_POST['save'])){
		$nama_matkul = $_POST['nama_matkul'];
		$dosen_pengampu = $_POST['dosen_pengampu'];

		$query = "INSERT INTO matkul (nama_matkul, dosen_pengampu) VALUES('$nama_matkul', '$dosen_pengampu')";
		if (mysqli_query($connect, $query)) {
			$_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data berhasil ditambahkan</div>";
			header("location:".$WEB_CONFIG['base_url']."matkul.php");
		}else{
			$_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal ditambahkan</div>";
			header("location:".$WEB_CONFIG['base_url']."matkul.php");
		}
	}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>satpam.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
		<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama">Nama</label>
			<input type="text" name="nama_matkul" class="form-control"  maxlength="40" required autofocus>
		</div>
		<div class="form-group">
			<label for="inputUsername">Username</label>
			<input type="username" name="dosen_pengampu" class="form-control"maxlength="30" required>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
	</form>
</div>
