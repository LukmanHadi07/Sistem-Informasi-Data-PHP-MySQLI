<?php 
include '../koneksi.php';

$id_dosen   = $_POST['id_dosen'];
$nip 		= Addslashes($_POST['nip']);
$nama 		= Addslashes($_POST['nama']);
$alamat 	= Addslashes($_POST['alamat']);

$query = mysqli_query($koneksi , "UPDATE  dosen SET nip = '$nip', nama = '$nama' ,  alamat = '$alamat'  WHERE id_dosen = '$id_dosen'") or die(mysql_error($koneksi));


if ($query) {
	echo "<script>alert('Data berhasil diedit!'); window.location='../dosen/dosen.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}