<?php 
include '../koneksi.php';

$id_dosen = $_GET['id_dosen'];
$query = mysqli_query($koneksi, "DELETE FROM dosen WHERE id_dosen = '$id_dosen'") or die(mysqli_error($koneksi));
if($query) {
    echo "<script>alert('Data berhasil diHapus!'); 
    window.location='../dosen/dosen.php';</script>";
}  else {
    echo "<script>alert('Data gagal dihapus');</script>";
}