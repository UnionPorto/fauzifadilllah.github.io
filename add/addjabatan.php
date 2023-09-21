
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
        <title>APASMAN - Position</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../img/image.png">

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
            $result = mysqli_query($db, "select * from jabatan");

            ?>              

                <?php

                include_once("../Configure/connection.php");

                // Fetch all users data from database
                $result = mysqli_query($db, "select * from jabatan");

                ?>

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-100">Data Position</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">APASMAN</a></li>
                                            <li class="breadcrumb-item active">Data Position</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Position</h4>
                                        <p class="card-subtitle mb-4">Insert Data Position</p>
    
                                        <form method="POST" action="addjabatan.php">
                                        <div class="form-group" method="POST">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <input type="text" class="form-control" placeholder="Enter your Position" name="jabatan" required>
                                            </div>

                                            <input class="btn btn-primary btn-block" type="submit" value="Add" name="addjabatan">
                                        </form>
                                    </div>
                                    <!-- end card-body-->
                                </div>     
                        <!-- end page title -->    
                        </div>

                        <?php
                            if(isset($_POST['addjabatan'])) {
                            $jabatan = $_POST['jabatan'];

                            // include database connection file
                            include_once("../Configure/connection.php");

                            // Insert user data into table

                            try { 
                                $query = "INSERT INTO jabatan(jabatan_karyawan) VALUES('$jabatan')";
                                $result = mysqli_query($db, $query); 
                            } catch (mysqli_sql_exception $e) { 
                                var_dump($e);
                                exit; 
                            } 
                            echo "<script>Swal.fire({
                            title: 'Success!',
                            text: 'Successfully add Position',
                            icon: 'success',
                            confirmButtonText: 'Cool!'
                            })</script>";
                            }

                        ?>

                        
                        <!-- end row-->


                        
                        <!--end row-->

                        <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Table Position</h4>
                                    
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                        <?php
                                            include_once("../Configure/connection.php");
                                            $i = 0;
                                            $query = mysqli_query($db, "select * from jabatan");
                                            while($datajabatan = mysqli_fetch_array($query)) {
                                            $i++;
                                        ?>
                                            <tr>
                                                <td width="5%"><?php echo $i;?></td>
                                                <td width="10%"><?php echo $datajabatan['id'];?></td>
                                                <td><?php echo $datajabatan['jabatan_karyawan'];?></td>
                                                <td><center><a href="#"  class="btn btn-warning" data-toggle="modal" data-backdrop="false" data-target="#modaledit<?php echo $datajabatan['id']; ?>" ><i class=" fas fa-wrench"></i></a> &nbsp 
                                                <a href="../hapus/hapusjabatan.php?jabatan_karyawan=<?php echo $datajabatan['jabatan_karyawan'];?>" class="btn btn-danger" ><i class="fas fa-trash"></i></a></center></td>
                                            
                                            <!-- Edit  -->
                                            <div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" id="modaledit<?php echo $datajabatan['id']; ?>">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>

                                                    <form method="POST" action="../edit/editjabatan.php">
                                                        <div class="modal-body">
                                                        <div class="card">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Id Jabatan</label>
                                                                        <input type="text" class="form-control" name="id_jabatan" value="<?php echo $datajabatan['id']; ?>" readonly>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Position</label>
                                                                        <select class="form-control" data-toggle="select2" name="jabatan1">
                                                                            <option><?php echo $datajabatan['jabatan_karyawan']; ?></option>
                                                                            <optgroup label="Position">
                                                                            <?php
                                                                                include_once("../Configure/connection.php");
                                                                                $selectjabatan = mysqli_query($db,"SELECT id,jabatan_karyawan FROM jabatan");
                                                                                while ($row = mysqli_fetch_array($selectjabatan)) {
                                                                            ?>
                                                                            <option value="<?php echo $row['jabatan_karyawan']; ?>"><?php echo $row['jabatan_karyawan']; ?></option>
                                                                            <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning" name="editjabatan">Update</button>
                                                    </div>
                                        
                                                </form>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                            </div>

                                            <?php }?>
                                        
                                        </tbody>
                                    </table>
                                    
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
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
    <script src="../template/admin/horizontal/assets/pages/datatables-demo.js"></script>

    <!-- App js -->
    <script src="../template/admin/horizontal/assets/js/theme.js"></script>


        <script src="../template/Admin/horizontal/assets/js/theme.js"></script>

    </body>

</html>