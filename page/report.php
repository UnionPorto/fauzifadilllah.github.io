<?php
session_start();
include_once("../Configure/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php

$idusers = $_SESSION['id_karyawan'];
$username = $_SESSION['username'];
$level = $_SESSION['level'];

?>

<head>
    <meta charset="utf-8" />
    <title>APASMAN </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App css -->
    <link href="../template/Admin/horizontal/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/horizontal/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/horizontal/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="../template/Admin/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

    <link href="../template/Admin/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <div class="main-content">

            <header id="page-topbar">
                <div class="navbar-header">
                    <!-- LOGO -->
                    <div class="navbar-brand-box d-flex align-items-left">
                        <a href="index.html" class="logo">
                            <i class="mdi mdi-album"></i>
                            <span>
                                APASMAN
                            </span>
                        </a>

                        <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn header-item waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="../img/1.jpg" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $username . ' | ' . $level; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../page/logout.php">
                                    <span>Log Out</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <?php 
                if($_SESSION['level']== 'admin'){
                    include('../page/menu/admin.php');

                }else {
                    include('../page/menu/karyawan.php');
                }
                
                ?>    

            <?php

            // Fetch all users data from database
            $result = mysqli_query($db, "select * from absen");

            ?>

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-100">Data Absen</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">APASMAN</a></li>
                                        <li class="breadcrumb-item active">Data Absen</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Data Absen</h4>
                                    <br>
                                    <form action="../report/tarikexcel.php" method="post" target="_blank">
                                        <table>
                                                <input hidden type="text" name="id_karyawan" value="<?php echo $idusers?>">
                                                <tr>Dari Tanggal</tr>
                                                <tr><input class="form-control" type="date" name="dari_tgl" required></tr><br>
                                                <tr>Sampai Tanggal</tr>
                                                <tr><input class="form-control" type="date" name="sampai_tgl" required></tr>
                                                <br>
                                                <tr><input type="submit" class="btn btn-success" name="filterexcel" value="Excel">&nbsp;</tr>
                                                <tr><input type="submit" class="btn btn-warning" name="filterpdf" value="PDF" ></tr>
                                        </table>
                                        
                                    </form>
                                    <br>
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Karyawan</th>
                                                <th>Nama</th>
                                                <th>Waktu Masuk</th>
                                                <th>Waktu Keluar</th>
                                                <th>Id Absen</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <?php
                                            $i = 0;

                                            if(isset($_POST['filterexcel'])){
                                                $dari_tgl =  $_POST['dari_tgl'];
                                                $sampai_tgl =  $_POST['sampai_tgl'];
                                                $result = mysqli_query($db, "select * from absen where date(clock_in) BETWEEN 'date($dari_tgl)' AND 'date($sampai_tgl)'");
                                            }else{
                                                $result = mysqli_query($db, "select * from absen ");
                                            }
                                            $result = mysqli_query($db, "select * from absen where id_karyawan='$idusers'");
                                            while ($dataabsen = mysqli_fetch_array($result)) {
                                                $i++;

                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $dataabsen['id_karyawan']; ?></td>
                                                    <td><?php echo $dataabsen['nama']; ?></td>
                                                    <td><?php echo $dataabsen['clock_in']; ?> AM</td>
                                                    <td><?php echo $dataabsen['clock_out']; ?> PM</td>
                                                    <td><?php echo $dataabsen['id_absen']; ?></td>
                                                </tr>
                                </div>
                            </div>
                        <?php
                                            }
                        ?>

                        </tbody>
                        </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

            <div class="main-content">


    <!-- end row-->



    <!--end row-->


    <!-- end row-->



    </div> <!-- container-fluid -->



    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-center text-lg-left">
                        2023 © HS.
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right d-none d-lg-block">
                        Design & Develop by FauziUnion
                    </div>
                </div>
            </div>
        </div>
    </footer>

    </div>
    <!-- end main content-->

    </div>



    <!-- end row-->
    <!-- END layout-wrapper -->



    <!-- jQuery  -->
    <script src="../template/admin/horizontal/assets/js/jquery.min.js"></script>
    <script src="../template/admin/horizontal/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../template/admin/horizontal/assets/js/metismenu.min.js"></script>
    <script src="../template/admin/horizontal/assets/js/waves.js"></script>
    <script src="../template/admin/horizontal/assets/js/simplebar.min.js"></script>

    <!-- third party js -->
    <script src="../template/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../template/Admin/plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="../template/Admin/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../template/Admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="../template/Admin/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../template/Admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../template/Admin/plugins/datatables/buttons.html5.min.js"></script>
    <script src="../template/Admin/plugins/datatables/buttons.flash.min.js"></script>
    <script src="../template/Admin/plugins/datatables/buttons.print.min.js"></script>
    <script src="../template/Admin/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="../template/Admin/plugins/datatables/dataTables.select.min.js"></script>
    <script src="../template/Admin/plugins/datatables/pdfmake.min.js"></script>
    <script src="../template/Admin/plugins/datatables/vfs_fonts.js"></script>

    
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="../template/Admin/horizontal/assets/pages/datatables-demo.js"></script>

    <!-- App js -->
    <script src="../template/Admin/horizontal/assets/js/theme.js"></script>

    <!-- Plugins js -->
    <script src="../template/Admin/plugins/autonumeric/autoNumeric-min.js"></script>
    <script src="../template/Admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../template/Admin/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="../template/Admin/plugins/moment/moment.js"></script>
    <script src="../template/Admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../template/Admin/plugins/select2/select2.min.js"></script>
    <script src="../template/Admin/plugins/switchery/switchery.min.js"></script>
    <script src="../template/Admin/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="../template/Admin/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="../template/Admin/horizontal/assets/js/theme.js"></script>
    <script src="../template/Admin/horizontal/assets/pages/advanced-plugins-demo.js"></script>

</body>

</html>