<?php 
include '../koneksi.php';

$id_mahasiswa = $_GET['id_mahasiswa'];
$query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'") or die(mysqli_error($koneksi));
if($query) {
    echo "<script>alert('Data berhasil diHapus!'); 
    window.location='../mahasiswa/mahasiswa.php';</script>";
}  else {
    echo "<script>alert('Data gagal dihapus');</script>";
}