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
        <title>APASMAN </title>
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
                                    Apas
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
$result = mysqli_query($db, "select * from Pemindahan");


$i = 1;
?>

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-100">Pemindahan</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">APASMAN</a></li>
                                            <li class="breadcrumb-item active">Pemindahan Data</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                                  $iduser = $_GET['kode_asset'];
          include_once("../configure/connection.php");


              $query = mysqli_query($db, "SELECT * FROM asset where kode_asset = '$iduser'");
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
                                        <h4 class="card-title">Add Asset</h4>
                                        <p class="card-subtitle mb-4">Insert Asset Data</p>
    
                                        <form method="POST" action="actionapprove.php?kode_asset=<?php echo $iduser; ?>">
                                            <div class="form-group" method="POST">
                                           
                                                <input class="form-control" type="text" placeholder="<?php echo $data['id'];?>"  value="<?php echo $data['id']; ?>"  name="idass" readonly>
                                                <br>     
                                                <label>kode asset</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['kode_asset'];?>"  value="<?php echo $data['kode_asset']; ?>"  name="kode_asset" readonly>
                                                <br>
                                                <label>Penjelasan</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['deskripsi'];?>"  value="<?php echo $data['deskripsi']; ?>"  name="deskripsi" >
                                                <br>
                                                <label>Status</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $data['status'];?>"  value="<?php echo $data['status']; ?>"  name="status" readonly>
                                                <br>
                                              
                                            
                                                <label>dari outlet</label>
                                                <select class="form-control" data-toggle="select2" name="outletdari">
                                                                            <option><?php echo $data['outlet_dari'];?></option>
                                                                            <optgroup label="Outlet">
                                                                            <?php
                                                                                include_once("../Configure/connection.php");
                                                                                $selectoutlet = mysqli_query($db,"SELECT * FROM outlet");
                                                                                while ($row = mysqli_fetch_array($selectoutlet)) {
                                                                            ?>
                                                                            <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                                                                            <?php } ?>
                                                                            </optgroup>
                                                                        </select>
                                                <br>
                                                <label>ke outlet</label>
                                                <select class="form-control" data-toggle="select2" name="outletke">
                                                                            <option><?php echo $data['outlet_ke'];?></option>
                                                                            <optgroup label="Outlet">
                                                                            <?php
                                                                                include_once("../Configure/connection.php");
                                                                                $selectoutlet = mysqli_query($db,"SELECT * FROM outlet");
                                                                                while ($row = mysqli_fetch_array($selectoutlet)) {
                                                                            ?>
                                                                            <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                                                                            <?php } ?>
                                                                            </optgroup>
                                                                        </select>
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
                                                <th>Nama Asset</th>
                                                <th>kode asset</th>
                                                <th>Remarks</th>
                                                <th>QTY</th>
                                                <th>id</th>
                                                <th>action</th>
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
                                                    <td><?php echo $dataketerangan['barang']; ?></td>
                                                    <td><?php echo $dataketerangan['kode_asset_detail']; ?></td>
                                                    <td><?php echo $dataketerangan['deskripsi']; ?></td>
                                                    <td><?php echo $dataketerangan['qty']; ?></td>
                                                    <td><?php echo $dataketerangan['id']; ?></td>
                                                    <td><center><a href="#"  class="btn btn-warning" data-toggle="modal" data-backdrop="false" data-target="#exampleModal<?php echo $dataketerangan['id']; ?>" ><i class=" fas fa-wrench"></i></a>
                                          </td>
                                                </tr>
                                              
                  
                                
                                        
                                        <!-- Modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal<?php echo $dataketerangan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="../asset/actioneditdetail.php">
                                                        <div class="modal-body">
                                                        <div class="card">
                                                        <input hidden type="text" class="form-control" name="idassetdetail" value="<?php echo $dataketerangan['id']; ?> " >
                                                                    <div class="form-group ">
                                                                        <label>kode asset</label>
                                                                        <input type="text" class="form-control" name="kode_asset_detail" value="<?php echo $dataketerangan['kode_asset_detail']; ?>" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Barang</label>
                                                                        <input type="text" class="form-control" name="namabarang" value="<?php echo $dataketerangan['barang']; ?>" >
                                                                   
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>QTY</label>
                                                                        <input type="text" class="form-control" name="quantity" value="<?php echo $dataketerangan['qty']; ?>" >
                                                                   
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Deskripsi</label>
                                                                        <input type="text" class="form-control" name="deskrip" value="<?php echo $dataketerangan['deskripsi']; ?>" >
                                                                   
                                                                    </div>
                                                               
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning" name="editdetail">Update</button>
                                                    </div>
                                        
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              
                        <?php
                                            }
                        ?>

                        </tbody>
                        </table>
                            
                                
                <?php 
                if($_SESSION['level']== 'admin'){
                  echo '<input class="btn btn-success btn-block" type="submit" value="Update" name="add">
                  <input class="btn btn-primary btn-block" type="submit" value="Approve" name="approve">';
            

              }else if($_SESSION['level']== 'user' && $data['status']== 'Approve'){
               
               
            
               echo $data['status'];
                
              }else{
                echo '<input class="btn btn-success btn-block" type="submit" value="Update" name="add">';     
                       
               echo $data['status'];
                
              }
              
              ?>       
              
              <?php
              
              ?>
                                            </form>
                   
                                            
                                           
                                    </div>
                                    <!-- end card-body-->
                                </div>     
                        <!-- end page title -->
                        </div>
                        <!-- end row-->

                        </script>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    
                        <?php
  
  // Check If form submitted, insert form data into users table.
  if(isset($_POST['add'])) {

  
    $kode_asset       = $_POST['kode_asset'];
    $deskripsi       = $_POST['deskripsi'];

      
      
      // include database connection file
      include_once("../configure/connection.php");
              
      // Insert user data into table
      $query = "INSERT INTO asset(id_karyawan,deskripsi,kode_asset,status) VALUES('$idusers','$deskripsi','$kode_asset','Pending')";
      $result = mysqli_query($db, $query); 
      echo "<script> Swal.fire({
        title: 'Success!',
        text: 'Successfully add asset',
        icon: 'success',
        confirmButtonTex :'Oke!'
    });  
        setTimeout(function(){window.location='../asset/read.php'} , 2000);

        </script>";
      // Show message when user added
      $desk       = $_POST['desk'];
      $barang         = $_POST['barang'];
      
     
      //  $iditem = $_POST['myoption'];
      @$total = count((array)$_POST['barang']);
    
      $hasili = $total-1;
      
      for($i=0; $i<$hasili; $i++){
        try { 
    
          
          
          $query1 = "insert into asset_detail(id_asset,deskripsi,barang)value(
                '$kode_asset',
                '$desk[$i]',
                '$barang[$i]'
                
                
              )";
            //   $query2 = "update item set qty = (qty -($qty[$i])) where id = '$item[$i]'";
      
          $result1 = mysqli_query($db, $query1);
          
        //   $result2 = mysqli_query($db, $query2);
        }
        
        
      catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit;   
      }
    
    }
    
 
        }
    


                   
                        
                        ?>
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