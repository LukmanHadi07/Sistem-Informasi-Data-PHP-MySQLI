<?php  

 session_start();
 include 'koneksi.php';
 if (isset($_POST['username'])) {
 	$username = $_POST['username'];
 	$password = sha1($_POST['password']);


 	$query = mysqli_query($koneksi , "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

 	$menghitungJumlahData = mysqli_num_rows($query);

 	if ($menghitungJumlahData > 0) {
 		$_SESSION['username'] = $row['username'];
 		$_SESSION['password'] = $row['password'];


 		header('location: dashboard.php');
 	}  

 	else {
 		echo "<script>window.location='index.php';</script>";
 	}
 }