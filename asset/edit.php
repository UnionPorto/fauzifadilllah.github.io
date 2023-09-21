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
        <title>APASMAN - pemindahan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../img/logoAPASMAN.png">

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
                                    APASMAN
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
      

            ?>                



                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-100">pemindahan</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">APASMAN</a></li>
                                            <li class="breadcrumb-item active">pemindahan Data</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                                  $iduser = $_GET['id'];
                                //   $kodeass = $_GET['kode_asset'];
          include_once("../configure/connection.php");


              $query = mysqli_query($db, "SELECT * FROM asset where id = '$iduser'");
              $data = mysqli_fetch_array($query);
            
              
              // mengambil angka dari kode asset terbesar, menggunakan fungsi substr
              // dan diubah ke integer dengan (int)
       
              
              // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    
              
              // membentuk kode asset baru
              // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
              // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
              // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        
                  

                      ?>


                        <div class="card">
                
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Edit pemindahan</h4>
                                        <p class="card-subtitle mb-4">Edit pemindahan Data</p>
    
                                        <form method="POST" action="actionedit.php?id=<?php echo $iduser; ?>">
                                            <div class="form-group" method="POST">
                                           
                                                <input class="form-control" type="text" placeholder="<?php echo $data['id'];?>"  value="<?php echo $data['id']; ?>"  name="idass" readonly>
                                                <br>    
                                            <br>
                                            <label>kode asset</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['kode_asset'];?>"  value="<?php echo $data['kode_asset']; ?>"  name="kode_asset" readonly>
                                                <br>
                                                <label>ID karyawan</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['id_karyawan'];?>"  value="<?php echo  $data['id_karyawan'];?>"  name="idusers" readonly>
                                                <br>
                                              
                                                <label>deskripsi</label>
                                                <input class="form-control" type="text" name="deskripsi" placeholder="<?php echo  $data['deskripsi'];?>" readonly>
                                                <br>
                                             
                                             
                                                <br>
                                                <div class="panel panel-default">
      <!-- <div class="panel-heading">List Asset</div> -->
      <div class="panel-body">
        <!-- membuat form  -->
        <!-- gunakan tanda [] untuk menampung array  -->
          <!-- <form action="proses.php" method="POST"> -->
          <div class="card">
                                <div class="card-body">
                       
                                    <h4 class="card-title">Data Keterangan</h4>
                                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                     
                                        
                                        <thead>
                                     
                                            <tr>
                                                <th>No</th>
                                                <th>kode asset</th>
                                                <th>Nama Asset</th>
                                                <th>QTY</th>
                                                <th>Remarks</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <?php
                                            $kodeasset = $data['kode_asset'];
                                            include_once("../Configure/connection.php");
                                            $i = 0;
                                            $result = mysqli_query($db, "select * from asset_detail where id_asset = '$kodeasset'");
                                            while ($dataketerangan = mysqli_fetch_array($result)) {
                                                $i++;

                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                             
                                                    <td><?php echo $dataketerangan['kode_asset_detail']; ?></td>
                                                    <td><?php echo $dataketerangan['barang']; ?></td>
                                                    <td><?php echo $dataketerangan['qty']; ?></td>
                                                    <td><?php echo $dataketerangan['deskripsi']; ?></td>
                                               
                                          
                                                </tr>
                                </div>
                            </div>
                        <?php
                                            }
                        ?>

                        </tbody>
                        </table>
                        
                        <input class="btn btn-success btn-block" type="submit" value="Approve" name="add">
                                            
                                            </form>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
     
                        
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
    <script src="../template/admin/horizontal/assets/pages/datatables-demo.js"></script>

    <!-- App js -->
    <script src="../template/admin/horizontal/assets/js/theme.js"></script>
    <script src="../template/Admin/horizontal/assets/js/theme.js"></script>


    <script type="text/javascript">
      $(document).ready(function() {
        $(".add-more").click(function(){ 
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click",".remove",function(){ 
            $(this).parents(".control-group").remove();
        });
      });
  </script>

    </body>

</html>