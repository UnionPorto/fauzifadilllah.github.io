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
          include_once("../configure/connection.php");
              $query = mysqli_query($db, "SELECT max(id) as idasset FROM asset");
              $data = mysqli_fetch_array($query);
              $asset1 = $data['idasset'];
              
              // mengambil angka dari kode asset terbesar, menggunakan fungsi substr
              // dan diubah ke integer dengan (int)
              $asset1++;
              
              // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    
              
              // membentuk kode asset baru
              // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
              // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
              // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
              $huruf = "PBR";
              $kode_asset = $huruf .'/'.date("d/m/y").'/'.sprintf("%03s",  $asset1);
                  

                      ?>


                        <div class="card">
                
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Perpindahan Asset</h4>
                                        <p class="card-subtitle mb-4">Tambah Transaksi Perpindahan Asset</p>
    
                                        <form method="POST" action="add.php">
                                            <div class="form-group" method="POST">
                                            <label>kode asset</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $kode_asset;?>"  value="<?php echo $kode_asset; ?>"  name="kode_asset" readonly>
                                                <br>
                                                <label>ID karyawan</label>
                                                <input class="form-control" type="text" placeholder="<?php echo $idusers;?>"  value="<?php echo $idusers; ?>"  name="idusers" readonly>
                                                <br>
                                              
                                                <label>penjelasan</label>
                                                <input class="form-control" type="text" name="deskripsi">
                                                <br>
                                                <label>dari outlet</label>
                                                <select class="form-control" data-toggle="select2" name="outletdari">
                                                                            <option>-Silahkan Pilih Outlet-</option>
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
                                                                            <option>-Silahkan Pilih Outlet-</option>
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
      <div class="panel-heading">List Asset</div>
      <div class="panel-body">
        <!-- membuat form  -->
        <!-- gunakan tanda [] untuk menampung array  -->
          <!-- <form action="proses.php" method="POST"> -->
            <div class="control-group after-add-more">
              <table>
                  <tr>
                      <th>kode asset</th>
                      <th>Nama Asset</th>
                      <th>Qty</th>
                      <th>Remarks</th>
                   
                      <th>action</th>
                  </tr>
                  <tr>
           

  
                  <th><input type="text" name="kode_asset_detail[]" class="form-control"></th>
              <th><input type="text" name="barang[]" class="form-control"></th>
              <th><input type="text" name="qty[]" class="form-control"></th>
              <th><input type="text" name="desk[]" class="form-control"></th>
            <th> <button class="btn btn-success add-more" type="button">
                <i class="glyphicon glyphicon-plus"></i> Add
              </button>
              </th>
            <th>
              </tr>
              </table>
              <hr>
            </div>
    


          <!-- class hide membuat form disembunyikan  -->
          <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
          <div class="copy invisible">
              <div class="control-group">
              <table>
                  <tr>
                  <th>kode asset</th>
                      <th>Nama Asset</th>
                      <th>Qty</th>
                      <th>Remarks</th>
                   
                      <th>action</th>
                  </tr>
                  <tr>
            
                 
             
  <th><input type="text" name="kode_asset_detail[]" class="form-control"></th>
              <th><input type="text" name="barang[]" class="form-control"></th>
              <th><input type="text" name="qty[]" class="form-control"></th>
              <th><input type="text" name="desk[]" class="form-control"></th>
            
            <th> <button class="btn btn-success add-more" type="button">
                <i class="glyphicon glyphicon-plus"></i> Add
              </button>
              </th>
            <th>
              </tr>
              </table>
                <br>
                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                <hr>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
                                             
                                                <input class="btn btn-primary btn-block" type="submit" value="Simpan" name="add">
                                            
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
    $outlet_dari       = $_POST['outletdari'];
    $outlet_ke       = $_POST['outletke'];

      
      
      // include database connection file
      include_once("../configure/connection.php");
              
      // Insert user data into table
      $query = "INSERT INTO asset(id_karyawan,deskripsi,kode_asset,status,outlet_dari,outlet_ke,tanggal_dibuat) VALUES('$idusers','$deskripsi','$kode_asset','Pending','$outlet_dari','$outlet_ke',CURRENT_DATE())";
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
      $kode_asset_detail       = $_POST['kode_asset_detail'];
      $qty         = $_POST['qty'];
      
     
      //  $iditem = $_POST['myoption'];
      @$total = count((array)$_POST['barang']);
    
      $hasili = $total-2;
      
      for($i=0; $i<$hasili; $i++){
        try { 
    
          
          
          $query1 = "insert into asset_detail(id_asset,deskripsi,barang,kode_asset_detail,qty)value(
                '$kode_asset',
                '$desk[$i]',
                '$barang[$i]',
                '$kode_asset_detail[$i]',
                '$qty[$i]'
                
                
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