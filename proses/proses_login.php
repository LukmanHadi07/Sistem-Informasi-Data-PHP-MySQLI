<?php 

 // Membuat session //
 session_start();
 include '';

 // Menangkap data //
 if (isset($_POST['username'])) {
 	$username = $_POST['username'];
 	$password = sha1($_POST['password']);

    $query = mysqli_query($koneksi , "SELECT * FROM WHERE username = '$username' AND password '$password'");

    $data = mysqli_num_rows($query);
    if ($data > 0 ) {
    	$_SESSION['username'] = $row['username'];
    	$_SESSION['password'] = $row['password'];

    	
    }
    


 }


 ?>