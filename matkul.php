<?php require 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title><?= $WEB_CONFIG['app_name'] ?></title>
	<link rel="stylesheet" href="assets/style.css">
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	<a class="navbar-brand" href="#">
		<img src="<?= $WEB_CONFIG['base_url'] ?>assets/img/icon.png" width="80" alt="">
		<?= $WEB_CONFIG['app_name'] ?>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?= $WEB_CONFIG['base_url'] ?>">Mahasiswa </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= $WEB_CONFIG['base_url'] ?>dosen.php">Dosen</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= $WEB_CONFIG['base_url'] ?>prodi.php">Prodi</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="<?= $WEB_CONFIG['base_url'] ?>matkul.php">Matkul</a>
			</li>
		</ul>
	</div>
	</nav>

	<?php 
		session_start();
		$content = (isset($_GET["page"])) ? $_GET["page"] : ""; 
	?>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<h4 class='text-uppercase'><?= $content ?> Data matkul</h4>
			</div>
			<div class="col-md-10">
			<?php
				if(isset($_SESSION['flash'])){
					echo $_SESSION['flash'];
					unset($_SESSION['flash']);
				}

				switch ($content) {
					case 'add':
						require 'operasi_matkul/create.php';
						break;
					case 'delete':
						require 'operasi_matkul/delete.php';
						break;
					case 'update':
						require 'operasi_matkul/update.php';
						break;
					default:
						require 'operasi_matkul/read.php';
						break;
				} 
			?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="assets/script.js"></script>
	<script type="text/javascript" src="assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>
