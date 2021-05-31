<?php

session_start();

require 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$check = mysqli_query($con, "SELECT * FROM tbl_login WHERE username = '$username'");
$data = mysqli_fetch_array($check);

if (mysqli_num_rows($check) <= 0) {
	
	echo "<script>alert('Username/Password salah!'); window.location = 'login.php';</script>";
} else {

	if (md5($password) != $data['password']) {
		
		echo "<script>alert('Username/Password salah!'); window.location = 'login.php';</script>";
	} else {

		$_SESSION['username'] = $username;
		header("location: index.php");
	}
}

?>