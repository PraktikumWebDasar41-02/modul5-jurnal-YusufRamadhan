<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<center>
		<br><br>
		<h1>Register Page</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Nim</td>
					<td>:</td>
					<td><input type="text" name="nim"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td colspan="3"><br><center><input type="submit" name="submit"></center> </td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>

<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'd_modul5');
	
	if (isset($_POST['submit'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$_SESSION["nama"] = $nama;
		$_SESSION["nim"] = $nim;
		if ($nim == is_numeric($nim)) {
			if (strlen($nim)==10 && strlen($nama)<=20 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$sql = "INSERT INTO t_jurnal1(NIM,Nama,Email) VALUES ($nim,'$nama','$email')";
				if (mysqli_query($db,$sql)) {
					echo "<script language = 'javascript'>alert('Database Input Success'); document.location=('Comment.php');</script>";
				}
				else{
					echo "<script language = 'javascript'>alert('Database Input Error'); document.location=('Register.php');</script>";	
				}
			}
			else{
				echo "<script language = 'javascript'>alert('input error'); document.location=('Register.php');</script>";
			}
		}
		else{
			echo "<script language = 'javascript'>alert('NIM harus numerik');
			 document.location=('Register.php');</script>";
		}
	}
?>