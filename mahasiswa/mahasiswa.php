<?php 

 session_start();
 include '../koneksi.php';

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Informasi Data </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
               <a class="nav-link" href="mahasiswa.php">
                     <i class="fas fa-fw fa-cog"></i>
                    <span>Data Mahasiswa</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
               <a class="nav-link" href="../dosen/dosen.php">
                     <i class="fas fa-fw fa-cog"></i>
                    <span>Data Dosen</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            </div>

            

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            
                            
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                            </a>
                            <!-- Dropdown - Messages -->
                           
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="text-align: center;">Data Mahasiswa</h6>
                             <a href="tambahData.php">
                          <button type="button" class="btn btn-primary">+ Tambah Data </button>
                        </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    // Menangkap data dan menampilkan data //
                                         include '../koneksi.php';
                                        $query = mysqli_query($koneksi , "SELECT * FROM mahasiswa") or die(mysqli_error($koneksi));
                                        
                                        // Konfigurasi Pagination //

                                 // Menghitung maskimal Pagination //
                                 $jumlahData = 5;
                                 $totalData = mysqli_num_rows($query);
                                 $jumlahPagination = ceil($totalData / $jumlahData);
                                 // end Menghitung //

                                 // Mengecek halaman apakah bisa diproses atau tidak //
                                 if (isset($_GET['halaman'])) {
                                   $halamanAktif = $_GET['halaman']; // jika halaman sudah diproses arahkan ke halaman aktif 
                                 } else {
                                   $halamanAktif = 1; // tidak diproses maka tetap ke halaman 1 // 
                                 }
                                 // end Mengecek pemprosesan //

                                // Mencari dataAwal pada Pagination //
                                 $dataAwal = ($halamanAktif * $jumlahData) - $jumlahData;


                                // Menghitung batas maksimal paginationnya //
                                 $jumlahLink = 3;
                                 if ($halamanAktif > $jumlahLink) {
                                     $start_number = $halamanAktif - $jumlahLink;
                                 } else {
                                    $start_number = 1;
                                 }

                                 if ($halamanAktif < ($jumlahPagination - $jumlahLink)) {
                                   $end_number = $halamanAktif + $jumlahLink;
                                 } else  {
                                   $end_number = $jumlahPagination;
                                 }
                                // end Konfigurasi //






                                 $ambilData_perhalaman = mysqli_query($koneksi, "SELECT * FROM mahasiswa LIMIT $dataAwal,$jumlahData") or die(mysqli_error($koneksi));
                                $nomor = 1 + $dataAwal;
                                while($data = mysqli_fetch_array($ambilData_perhalaman)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $nomor++; ?></td>
                                            <td><?php echo $data['nim']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['jurusan']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td>
                                                <a href="editData.php?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>"><button class="btn btn-danger badge">Edit</button></a>
                                                  ||
                                                  <a href="../proses/proses_hapusData.php?id_mahasiswa=<?php echo $data['id_mahasiswa']; ?>" onclick="return confirm('Yakin Hapus Data')"><button class="btn btn-warning badge" >Hapus</button></a> 
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    <!-- Menampilkan Pagination -->
              <nav aria-label="Page navigation example">
                <ul class="pagination">

                  <?php if ($halamanAktif > 1): ?>
                     <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>">
                       Previous
                     </a></li>
                  <?php endif ?>
                  <?php for ($i=$start_number; $i <= $end_number ; $i++) : ?>

                    <?php if ($halamanAktif == $i) :?>
                     <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>">
                       <?= $i; ?>
                     </a></li>

                    <?php else : ?>
                       <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>">
                       <?= $i; ?>
                     </a></li>

                    <?php endif; ?>

                  <?php endfor; ?>

                   <?php if ($halamanAktif < $jumlahPagination): ?>
                     <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">
                       Next
                     </a></li>
                  <?php endif ?>
                </ul>
              </nav>
          <!-- end Pagination -->
                                                    <tr>
                                               </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
                <!-- /.container-fluid -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; @Jurigen Dev</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>