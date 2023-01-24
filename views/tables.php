<?php 
    require '../application/functions.php';

    $id = $_GET["id"];


    $alat = query("SELECT * FROM dt_alat WHERE id = $id ")[0];
    $alat_nav = query("SELECT * FROM dt_alat WHERE tipe_alat = 1");
    $alat_com = query("SELECT * FROM dt_alat WHERE tipe_alat = 2");
    $alt = "jumlah_".$alat['alat_id']."";
    $kpl = query("SELECT * FROM db_kp WHERE $alt > 0");

    $jml_kp = count($kpl);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kapal Polisi</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .table thead th {
            vertical-align: middle;
            text-align: center;
            border-bottom: 2px solid #dee2e6;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-ship"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kapal Polisi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <?php if (!empty($_SESSION['admin'])) {?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Data Edit
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link pb-0"  href="add-data.php">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Data Kapal Polisi</span>
                </a>
            </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">
 
            <!-- Heading -->
            <div class="sidebar-heading">
                Tampilan Data
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tabel-data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a href="all-data-tables.php" class="collapse-item">Seluruh Data</a>
                        <h6 class="collapse-header">Navigasi</h6>
                        <?php foreach ($alat_nav as $row) : ?>
                        <a class="collapse-item" href="tables.php?id=<?= $row['id']; ?>"><?= $row['nama_alat']; ?></a>
                        <?php endforeach; ?>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Komunikasi</h6>
                        <?php foreach ($alat_com as $row) : ?>
                        <a class="collapse-item" href="tables.php?id=<?= $row['id']; ?>"><?= $row['nama_alat']; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
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

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                    <div class="d-sm-flex align-items-baseline justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">Data Kapal Polisi</h1>
                        <?php if ( $jml_kp > 0 ): ?>
                            <a href="../application/report.php?id=<?= $alat['id']?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        <?php else: ?>
                            <a href="../application/report.php?id=<?= $alat['id']?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm disabled" role="button" aria-disabled="true"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        <?php endif;  ?>
                    </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Kapal</th>
                                        <th rowspan="2">No Lambung</th>
                                        <th rowspan="2">Klas</th>
                                        <th rowspan="2">Tahun Pembuatan</th>
                                        <th colspan="3"><?= $alat['nama_alat']; ?></th>
                                        <?php if (!empty($_SESSION['admin'])) {?>
                                        <th rowspan="2">Edit</th>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <th>Kondisi</th>
                                        <th>Merk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $x = 1; ?>
                                    <?php foreach($kpl as $row) : ?>
                                        <tr>
                                            <td></td>
                                            <td><?= $row['nama_kapal']; ?></td>
                                            <td><?= $row['no_lambung_kapal']; ?></td>
                                            <td><?= $row['klas_kapal']; ?></td>
                                            <td><?= $row['thn_kp']; ?></td>
                                            <td><?= $row['jumlah_'.$alat['alat_id']]; ?></td>
                                            <td><?= $row['kondisi_'.$alat['alat_id']]; ?></td>
                                            <td><?= $row['merk_'.$alat['alat_id']]; ?></td>
                                            <?php if (!empty($_SESSION['admin'])) {?>
                                            <td><a class="btn btn-danger" href="../application/hapus.php?id=<?= $row["id"]; ?>&alat_id=<?= $id ?>" onclick="return confirm('anda yakin ?');"><i class="fa fa-trash"></i></a>&nbsp;<a class="btn btn-warning" href="edit-data.php?id=<?= $row['id']; ?>"><i class="fa fa-edit"></i></a>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Helios Sinatrya 2021</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/app.js"></script>

</body>

</html>