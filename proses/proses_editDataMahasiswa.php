<?php 
include '../koneksi.php';

$id_mahasiswa   = $_POST['id_mahasiswa'];
$nim 		= Addslashes($_POST['nim']);
$nama 		= Addslashes($_POST['nama']);
$jurusan 	= Addslashes($_POST['jurusan']);
$alamat 	= Addslashes($_POST['alamat']);

$query = mysqli_query($koneksi , "UPDATE  mahasiswa SET nim = '$nim', nama = '$nama' , jurusan = '$jurusan' ,alamat = '$alamat'  WHERE id_mahasiswa = '$id_mahasiswa'") or die(mysql_error($koneksi));


if ($query) {
	echo "<script>alert('Data berhasil diedit!'); window.location='../mahasiswa/mahasiswa.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}