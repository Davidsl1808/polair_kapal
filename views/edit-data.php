<?php 

    require '../application/functions.php';

    $alat = query("SELECT * FROM dt_alat");
    $alat_nav = query("SELECT * FROM dt_alat WHERE tipe_alat = 1");
    $alat_com = query("SELECT * FROM dt_alat WHERE tipe_alat = 2");
    $id = $_GET["id"];
    $kpl = query("SELECT * FROM db_kp WHERE id = $id ")[0];

    if (isset($_POST["submit"]) ){
        
        if( ubah($_POST) > 0 ){
            echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = '../index.php';
            </script>

            ";
        }
        else{
            echo "data gagal ditambahkan";;
        }
    }
    
?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Gilang Rama Syaputra">

    <title>Kapal Polisi</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Edit
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="add-data.php">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Data Kapal Polisi</span>
                </a>
            </li>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Data Kapal Polisi</h1>
                    </div>

                    <!-- page form -->
                    <form method="POST" action="">
                        <div class="row mb-2">
                            <input type="hidden" name="id" value="<?= $kpl["id"]; ?>">
                            <label for="inputNamaKp" class="col-sm-2 col-form-label fw-bold">Nama Kapal</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputNamaKp" name="nama_kapal" value="<?= $kpl['nama_kapal'] ; ?>">
                            </div>   
                            <label for="inputNoLk" class="col-sm-2 col-form-label fw-bold">No Lambung Kapal</label>
                            <div class="col-sm-4">
                                <input type="number" maxlength="4" class="form-control" id="inputNoLk" name="no_lambung_kapal" value="<?= $kpl['no_lambung_kapal'] ; ?>">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="inputKlas" class="col-sm-2 col-form-label fw-bold">Klas</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputKlas" name="klas_kapal" value="<?= $kpl['klas_kapal'] ; ?>">
                            </div>
                            <label for="inputTahun" class="col-sm-2 col-form-label fw-bold">Tahun</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="inputTahun" name="thn_kp" value="<?= $kpl['thn_kp'] ; ?>" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center mt-2 mb-2">
                                <h4>Jumlah, Merk, dan Kondisi Alat</h4>
                            </div>
                        </div>
                        <?php foreach($alat as $row) : ?>
                        <div class="row d-flex align-items-baseline">
                            <label for="inputjumlah<?= $row["alat_id"]; ?>" class="col-sm-2 col-form-label fw-bold"><?= $row["nama_alat"]; ?></label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="jumlah_<?= $row["alat_id"]; ?>" id="inputjumlah<?= $row["alat_id"]; ?>" placeholder="Jumlah" value="<?= $kpl['jumlah_'.$row["alat_id"]]; ?>" >
                            </div>  
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="merk_<?= $row["alat_id"]; ?>" id="merk" placeholder="Merk" value="<?= $kpl['merk_'.$row["alat_id"]]; ?>" >
                            </div>
                            <div class="col-sm-6 mb-3 d-flex align-item-center">
                                <label class="fw-bold">Kondisi : &nbsp</label>
                                <div class="radio-1 mr-2">
                                    <input class="kondisi-radio kondisi-radio-b" value="Baik" <?= ($kpl['kondisi_'. $row["alat_id"]]=='Baik')?'checked':'' ?> type="radio" name="kondisi_<?= $row["alat_id"]; ?>" id="inputkondisi<?= $row["alat_id"]; ?>1">
                                    <label class="form-check-label label-kondisi" for="inputkondisi<?= $row["alat_id"]; ?>1">
                                        Baik
                                    </label> 
                                </div>
                                <div class="radio-2 mr-2">
                                    <input class="kondisi-radio kondisi-radio-kb" value="Rusak Ringan" <?= ($kpl['kondisi_'. $row["alat_id"]]=='Rusak Ringan')?'checked':'' ?> type="radio" name="kondisi_<?= $row["alat_id"]; ?>" id="inputkondisi<?= $row["alat_id"]; ?>2">
                                    <label class="form-check-label label-kondisi" for="inputkondisi<?= $row["alat_id"]; ?>2">
                                        Rusak Ringan
                                    </label> 
                                </div>
                                <div class="radio-3 mr-2">
                                    <input class="kondisi-radio kondisi-radio-r" value="Rusak Berat" <?= ($kpl['kondisi_'. $row["alat_id"]]=='Rusak Berat')?'checked':'' ?> type="radio" name="kondisi_<?= $row["alat_id"]; ?>" id="inputkondisi<?= $row["alat_id"]; ?>3">
                                    <label class="form-check-label label-kondisi" for="inputkondisi<?= $row["alat_id"]; ?>3">
                                        Rusak Berat
                                    </label> 
                                </div>
                            </div>
                            <hr>
                        </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary mb-5" name="submit">Ubah Data</button>
                    </form>


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
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>