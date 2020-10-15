<?php 
$prodiErr = $kaprodiErr  = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nama_prodi']) || !isset($_POST['ketua_prodi'])){
		if($_POST['nama_prodi'] == ""){
			$prodiErr = "Nama tidak boleh kosong!";
		}
		if($_POST['ketua_prodi'] == ""){
			$kaprodiErr = "Username tidak boleh kosong!";
		}
	}else{
		$nama_prodi = $_POST['nama_prodi'];
		$ketua_prodi = $_POST['ketua_prodi'];

		$query = "INSERT INTO prodi (nama_prodi, ketua_prodi) VALUES('$nama_prodi', '$ketua_prodi')";
		if (mysqli_query($connect, $query)) {
			$_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data berhasil ditambahkan</div>";
			header("location:".$WEB_CONFIG['base_url']."prodi.php");
		}else{
			$_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal ditambahkan</div>";
			header("location:".$WEB_CONFIG['base_url']."prodi.php");
		}
	}
}
?>

<a href="<?= $WEB_CONFIG['base_url'] ?>prodi.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24" class="mb-1">
		<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama">Nama Prodi</label>
			<input type="text" name="nama_prodi" class="form-control" id="inputNama" maxlength="40"  autofocus>
			<small class="text-danger"><?= $prodiErr == "" ? "":"* $prodiErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputUsername">Ketua prodi</label>
			<input type="username" name="ketua_prodi" class="form-control" id="inputUsername" maxlength="30" >
			<small class="text-danger"><?= $kaprodiErr == "" ? "":"* $kaprodiErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Save Now!">
	</form>
</div>
