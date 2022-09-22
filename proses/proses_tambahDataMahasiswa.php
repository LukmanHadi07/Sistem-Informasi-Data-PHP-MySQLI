<?php 

include '../koneksi.php';

$nim 		= Addslashes($_POST['nim']);
$nama 		= Addslashes($_POST['nama']);
$jurusan 	= Addslashes($_POST['jurusan']);
$alamat 	= Addslashes($_POST['alamat']);

$query = mysqli_query($koneksi , "INSERT INTO mahasiswa(nim,nama,jurusan,alamat) VALUES ('$nim','$nama','$jurusan','$alamat')") or die(mysqli_error($koneksi));


if ($query) {
	echo "<script>alert('Data berhasil ditambahkan!'); window.location='../mahasiswa/mahasiswa.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}





 ?>