<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php


$idusers = $_SESSION['id'];
$username = $_SESSION['Username'];
$level = $_SESSION['Level'];

?>
    <head>
        <meta charset="utf-8" />
        <title>INVENT - SCAN </title>
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
                                    Inventory
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
                  if($_SESSION['Level']== 'admin'){
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
$result = mysqli_query($db, "select * from scan");


$i = 1;
?>

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-100">Scan</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Invent</a></li>
                                            <li class="breadcrumb-item active">Scan Asset</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
          include_once("../configure/connection.php");
              $query = mysqli_query($db, "SELECT count(id) as idasset FROM scan");
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
              $huruf = "SA";
              $kode_asset = $huruf .'/'.date("d/m/y").'/'.sprintf("%03s",  $asset1);
                  

                      ?>


                        <div class="card">
                
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Scan Asset</h4>
                                        <p class="card-subtitle mb-4">Tambah Transaksi Scan Asset</p>
    
                                        <?php
                                            
                                            $Kode = $_GET['id'];

                                            ?>
                                            <div class="form-group">
                                            <label>Kode Scan</label>
                                         
                                                <input class="form-control" type="text"   value="<?php echo $Kode; ?>"  name="kode_asset" readonly>
                                                <!-- <br> -->
                                                <!-- <label>ID karyawan</label> -->
                                                <input class="form-control" type="text" placeholder="<?php echo $idusers;?>"  value="<?php echo $idusers; ?>"  name="idusers" hidden>
                                                <br>
                                              
                                               
                                                <div class="panel panel-default">
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                                <script>
	$(document).ready(function(){
		load_data();
		function load_data(query1)
		{
			$.ajax({
			url:"searchresult.php",
			method:"POST",
			data:{query1:query1},
			success:function(data)
			{
				$('#result').html(data);
                
			}
			});
		}
		$('#search2').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
            setTimeout(myFunction, 100);
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
        function myFunction() {
            $('#tambahdetail').click();
}
	});
	</script>


<form method="POST" action="adddetail.php">
      <div class="panel-heading">List Item</div>
      <hr>
      <label class="panel-heading">Barcode</label>
      <input class="form-control" type="text"   value="<?php echo $Kode; ?>"  name="kode_detail" readonly hidden>
      <input class="form-control"  type="text" placeholder="Barcode" id="search2" name="search2" autofocus>
                                     
   
      <div id="result"></div>     
      

                                        
      <!-- <div class="panel-body"> -->
        <!-- membuat form  -->
        <!-- gunakan tanda [] untuk menampung array  -->
          <!-- <form action="proses.php" method="POST"> -->
            <!-- <div class="control-group after-add-more">
              <table>
                  <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
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
     -->


          <!-- class hide membuat form disembunyikan  -->
          <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
          <!-- <div class="copy invisible">
              <div class="control-group">
              <table>
                  <tr> 
                  <th>Kode Asset</th>
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
          </div> -->
      </div>
    </div>
  </div>
                                             <a href="../asset/readadmin.php" class="btn btn-success btn-block" value="Selesai">Selesai</a>
                                                <!-- <input class="btn btn-primary btn-block" type="submit" value="Simpan" name="add">
                                             -->
                                            </form>
                                    </div>
                                    <!-- end card-body-->
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
                                                <th>Nama Item</th>
                                                <th>Barcode</th>
                                                <th>QTY</th>
                                                <!-- <th>id</th> -->
                                                
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <?php
                                          
                                              $Kode = $_GET['id'];
  
                                            
                                            include_once("../Configure/connection.php");
                                            $i = 0;
                                            $result = mysqli_query($db, "select A.Qty,A.Id_Scan,B.Nama,A.Barcode from detail_scan A INNER join item B on A.Barcode = B.Barcode where A.Id_Scan = '$Kode';");
                                            while ($dataketerangan = mysqli_fetch_array($result)) {
                                                $i++;

                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $dataketerangan['Nama']; ?></td>
                                                    <td><?php echo $dataketerangan['Barcode']; ?></td>
                                                    <td><?php echo $dataketerangan['Qty']; ?></td>
                                               
                                                    <!-- <td><center><a href="#"  class="btn btn-warning" data-toggle="modal" data-backdrop="false" data-target="#exampleModal1<?php echo $dataketerangan['id']; ?>" ><i class=" fas fa-wrench"></i></a> -->
                                         </td>
                                                </tr>
                                              
                  
                                
                                        
                                        <!-- Modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1<?php echo $dataketerangan['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        
                                                    <!-- <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-warning" name="editdetail">Update</button>
                                                    </div> -->
                                        
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="../asset/retained.php">
                                                        <div class="modal-body">
                                                        <div class="card">
                                                        <input hidden type="text" class="form-control" name="idassetdetail" value="<?php echo $data['id']; ?> " >
                                                                    <div class="form-group ">
                                                                        <label>Alasan Di Kembalikan</label>
                                                                        <input type="text" class="form-control" name="description" >
                                                                    </div>
                                                                  
                                                               
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-warning" name="kembalikan1">Kembalikan</button>
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
                        
                         
               
                            
                            </div>
                            
                    
                                                 
                                            </form>
                                           
  
                                            
                                           
                                    </div>
                                    <!-- end card-body-->
                                </div>     
                        <!-- end page title -->
                        </div>
                                </div>     
                        <!-- end page title -->
                        </div>
                        <!-- end row-->

                        </script>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    
                        <?php
  

 
  if(isset($_POST['tambahdetail'])) {


            include_once("../Configure/connection.php");
           
            $KodeLink       = $_POST['kode_detail'];
            $Barcode       = $_POST['search2'];
            $NamaItem       = $_POST['NamaItem'];
            $Qty       = $_POST['Qty'];
 
        
            $query = mysqli_query($db, "INSERT INTO detail_scan(Id,Id_Scan, Nama_Item, Barcode, Qty) VALUES ('','$KodeLink','$NamaItem','$Barcode','$Qty')");
            echo "<script> Swal.fire({
                title: 'Success!',
                text: 'Successfully update asset',
                icon: 'success',
                confirmButtonTex :'Oke!'
            });  
                setTimeout(function(){window.location='../asset/adddetail.php?id=$KodeLink'} , 100);
        
                </script>";

        }else{

       
        }
              

  // Check If form submitted, insert form data into users table.
  


                   
                        
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