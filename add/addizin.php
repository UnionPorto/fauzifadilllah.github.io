
<?php 
    session_start();
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
        <title>APASMAN t</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../img/image.png">

        <!-- Dropify css -->
        <link href="../template/Admin/plugins/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="../template/Admin/horizontal/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/horizontal/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/horizontal/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css -->
        <link href="../template/Admin/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

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
                                    H S
                                </span>
                            </a>

                            <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>
                        </div>
        
                        <div class="d-flex align-items-center">
                            <div class="dropdown d-inline-block ml-2">
                                <button type="button" class="btn header-item waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="../img/1.jpg"
                                        alt="Header Avatar">
                                    <span class="d-none d-sm-inline-block ml-1"><?php  echo $username.' | '. $level;?></span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                                        <span>Profile</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                                        Settings
                                    </a>
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

                include_once("../Configure/connection.php");

                // Fetch all users data from database
                $result = mysqli_query($db, "select * from absen");

                ?>

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-100">Permision</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">APASMAN</a></li>
                                            <li class="breadcrumb-item active">Permision</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            date_default_timezone_set("Asia/Jakarta");
                            date_default_timezone_get();
                        ?>

                        <?php
                            include_once("../Configure/connection.php");
                            $maxid = mysqli_query($db,"select max(id_keterangan) as 'idketerangan1' from keterangan");
                            
                            while($result1 = mysqli_fetch_array($maxid)){
                                $idterakhir  = $result1['idketerangan1'];
                                $tambahid = $idterakhir+1;
                        }

                        ?>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Permision</h4>
                                        <p class="card-subtitle mb-4">Insert Your Permision</p>
    
                                        <form method="POST" action="addizin.php" enctype="multipart/form-data">
                                        <div class="form-group" method="POST">
                                            <div class="form-group">
                                                <label>Information Id</label>
                                                <input type="text" class="form-control" pattern="[A-Za-z]{3}" value="<?php echo $tambahid?>" name="idketerangan" readonly>
                                                <br>
                                                <label>Employee Id</label>
                                                <input type="text" class="form-control" pattern="[A-Za-z]{3}" value="<?php echo $idusers ?>" name="idkaryawan" readonly>
                                                <br>
                                                <label>Employee Name</label>
                                                <input type="text" class="form-control" pattern="[A-Za-z]{3}" value="<?php echo $username ?>" name="namakaryawan" readonly>
                                                <br>
                                                <label>Information</label>
                                                <select class="form-control" data-toggle="select2" name="informasi" required>
                                                    <option>-- Select --</option>
                                                    <optgroup label="Information">
                                                        <option value="Sakit">Sakit</option>
                                                        <option value="Izin">Izin</option>
                                                    </optgroup>
                                                </select>
                                                <br>
                                                <label>Reason</label>
                                                <input type="text" class="form-control" placeholder="Insert Your Reason" name="alasan" required>
                                                <br>
                                                <label>Date</label>
                                                <input type="text" class="form-control" pattern="[A-Za-z]{3}" value="<?php echo date('l, d-m-Y' );?>" name="tanggal" readonly>
                                                <br>
                                                <label>Photo Evidence</label>
                                                <div class="card-body" required name="fotobukti">
                                                    <p class="card-subtitle mb-4">Insert Your Photo Evidence.</p>
                                                    <input type="file" name="bukti" class="dropify" data-max-file-size="1M" />
                                                </div>
                                            </div>
                                            </div>

                                            <input class="btn btn-primary btn-block" type="submit" value="Submit" name="addizin">
                                            <a class="btn btn-danger btn-block" type="button" href="clockin.php">Cancel</a>
                                        </form>
                                    </div>
                                    
                                    <?php
                                    include_once("../Configure/connection.php");
                                    if(isset($_POST['addizin'])) {


                                        $idketerangan = $_POST['idketerangan'];
                                        $idkaryawan = $_POST['idkaryawan'];
                                        $namakaryawan = $_POST['namakaryawan'];
                                        $information = $_POST['informasi'];
                                        $reason = $_POST['alasan'];
                                        $date = $_POST['tanggal'];

                                        //untuk gambar
                                        $bukti = $_FILES['bukti']['name'];
                                        $tmp = $_FILES['bukti']['tmp_name'];
                                        $buktibaru = date('dmYHis').$bukti;
                                        $path = "img/".$buktibaru;

                                    try { 
                                    move_uploaded_file($tmp, $path);
                                    $query = "INSERT INTO keterangan(id_keterangan,id_karyawan,nama,keterangan,alasan,waktu,bukti) VALUES('$idketerangan','$idkaryawan','$namakaryawan','$information','$reason','$date','$path')";
                                    $result = mysqli_query($db, $query); 
                                    } catch (mysqli_sql_exception $e) { 
                                        var_dump($e);
                                        exit; 
                                    } 
                                    echo "<script>Swal.fire({
                                        title: 'Success!',
                                        text: 'Successfully add Izin',
                                        icon: 'success',
                                        confirmButtonText: 'Cool!'
                                        })</script>";
                                        }
                                    
                                    ?>

                                </div>     
                        <!-- end page title -->    
                        </div>
                        
                        <!-- end row-->


                        
                        <!--end row-->

                         <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->


                        
                    </div> <!-- container-fluid -->

                    

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
    <script src="../template/admin/horizontal/assets/js/metismenu.min.js"></script>
    <script src="../template/admin/horizontal/assets/js/jquery.min.js"></script>
    <script src="../template/admin/horizontal/assets/js/bootstrap.bundle.min.js"></script>
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
    <script src="../template/admin/horizontal/assets/pages/datatables-demo.js"></script>

    <!-- App js -->
    <script src="../template/Admin/horizontal/assets/js/theme.js"></script>

    </body>

</html>