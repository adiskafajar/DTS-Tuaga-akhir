<?php 

//WEB CONFIG
$WEB_CONFIG = [
	'app_name' => 'Member APP', 
	'base_url' => 'http://localhost:8080/DTS-Project-Akhir/'
];

//DATABASE CONFIG
$DB_CONFIG = [
	'host' => 'localhost',
	'user' => 'root',
	'passwd' => '',
	'db_name' => 'crud_dts_native'
];		
$connect = mysqli_connect($DB_CONFIG['host'], $DB_CONFIG['user'], $DB_CONFIG['passwd'], $DB_CONFIG['db_name']);
