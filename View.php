<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'd_modul5');
	$nama = $_SESSION["nama"];
	echo "Nama : ".$nama;
	
?>