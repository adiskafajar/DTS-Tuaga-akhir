<?php 
$prodiErr = $kaprodiErr = "";
if(isset($_POST['save'])){
	if(!isset($_POST['nama_prodi']) || !isset($_POST['ketua_prodi'])){
		if($_POST['nama_prodi'] == ""){
			$prodiErr = "Nama tidak boleh kosong!";
		}
		if($_POST['ketua_prodi'] == ""){
			$kaprodiErr = "Username tidak boleh kosong!";
		}
	}else{
		$id = $_GET['id'];
		$nama_prodi = $_POST['nama_prodi'];
		$ketua_prodi = $_POST['ketua_prodi'];

		$query = "INSERT INTO prodi (nama_prodi, ketua_prodi) VALUES('nama_prodi', 'ketua_prodi')";
		$query = "UPDATE prodi SET nama_prodi='$nama_prodi', ketua_prodi = '$ketua_prodi' WHERE id=$id";
		if (mysqli_query($connect, $query)) {
			$_SESSION['flash'] = "<div class=\"alert alert-success\" role=\"alert\">Data berhasil diubah</div>";
			header("location:".$WEB_CONFIG['base_url']."prodi.php");
		}else{
			$_SESSION['flash'] = "<div class=\"alert alert-danger\" role=\"alert\">Data gagal diubah</div>";
			header("location:".$WEB_CONFIG['base_url']."prodi.php");
		}
	}
}

$id = $_GET['id'];
$query = "SELECT * FROM prodi WHERE id = $id";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

?>

<a href="<?= $WEB_CONFIG['base_url'] ?>prodi.php" class="btn btn-warning mb-3">
	<svg style="width:20px;height:20px" viewBox="0 0 24 24">
		<path fill="#000000" d="M2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12M18,11H10L13.5,7.5L12.08,6.08L6.16,12L12.08,17.92L13.5,16.5L10,13H18V11Z" />
	</svg> Back To Data
</a>
<div class="container">
	<form action="" method="post">
		<div class="form-group">
			<label for="inputNama">Nama Prodi</label>
			<input type="text" name="nama_prodi" class="form-control" id="inputNama" value="<?= $data['nama_prodi'] ?>" maxlength="40" required autofocus>
			<small class="text-danger"><?= $prodiErr == "" ? "":"* $prodiErr " ?></small>
		</div>
		<div class="form-group">
			<label for="inputUsername">Ketua Prodi</label>
			<input type="username" name="ketua_prodi" class="form-control" id="inputUsername" value="<?= $data['ketua_prodi'] ?>" maxlength="30" required>
			<small class="text-danger"><?= $kaprodiErr == "" ? "":"* $kaprodiErr" ?></small>
		</div>
		<input type="submit" class="btn btn-dark m-1" name="save" value="Update Now!">
	</form>
</div>
