<?php 

include '../koneksi.php';

$nip 		= addslashes($_POST['nip']);
$nama 		= addslashes($_POST['nama']);
$alamat 	= addslashes($_POST['alamat']);

$query = mysqli_query($koneksi , "INSERT INTO dosen(nip,nama,alamat) VALUES ('$nip','$nama','$alamat')") or die(mysqli_error($koneksi));


if ($query) {
	echo "<script>alert('Data berhasil ditambahkan!'); window.location='../dosen/dosen.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}





 ?>