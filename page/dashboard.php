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
        <title>INVENT - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../img/LogoInvent.png">

        <!--calendar css-->
        <link href="../template/Admin/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />

        <!-- App css -->
        <link href="../template/Admin/horizontal/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/horizontal/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../template/Admin/horizontal/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

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
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="logout.php">
                                        <span>Log Out</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"  data-toggle="modal" data-backdrop="false" data-target="#exampleModal1<?php echo $idusers; ?>"  href="#">
                                        <span>Ubah Password</span>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </header>
            <!-- modal -->
                <div class="modal fade" id="exampleModal1<?php echo $idusers; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                                                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="changepassword.php">
                                                        <div class="modal-body">
                                                        <div class="card">
                                                        <input hidden type="text" class="form-control" name="iduserr" value="<?php echo $idusers; ?> " >
                                                                    <div class="form-group ">
                                                                        <label>Password Lama</label>
                                                                        <input type="text" class="form-control" name="passwordlama">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Password Baru</label>
                                                                        <input type="text" class="form-control" name="passwordbaru"  >
                                                                   
                                                                    </div>
                                                                  
                                                               
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="updatepassword">Update</button>
                                                    </div>
                                        
                                                </form>
                                                </div>
                                            </div>
                                        </div>
               <!-- end modal -->
                <?php 
                if($_SESSION['Level']== 'admin'){
                    include('menu/admin.php');

                }
                else if($_SESSION['Level']== 'om') {
                    include('menu/superadmin.php');
                }else {
                    include('menu/karyawan.php');
                }
                
                ?>                

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
    
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">INVENT</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <?php

                            include_once("../configure/connection.php");

                            // Karyawan
                            $result = mysqli_query($db, "SELECT count(id) as 'item' FROM item;");
                            $i = 1;
                            while($user_data = mysqli_fetch_array($result))
                            {
                            $item = $user_data['item'];
                            }


                                  // asset
                                //   $result = mysqli_query($db, "SELECT count(id) as 'asset' FROM asset;");
                                //   $i = 1;
                                //   while($user_data = mysqli_fetch_array($result))
                                //   {
                                //   $asset = $user_data['asset'];
                                //   }
                          
                        ?>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Data Item</h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    <?php echo $item?> Item
                                                </h2>
                                            </div>
                                        </div>

                                        <div class="progress shadow-sm" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <!--end card body-->
                                </div><!-- end card-->
                            </div> <!-- end col-->
                           

                           
                           

                            
                        </div>
                        <!-- end row-->
                        <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <!-- <h4 class="mb-0 font-size-18">Calendar</h4> -->
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
        
                                                <!-- <h6 class="mb-3">Create Events</h6>
                                                <form method="post" id="add_event_form">
                                                    <input type="text" class="form-control new-event-form" placeholder="Create new event..." />
                                                </form> -->
<!--         
                                                <div id='external-events' class="mt-4">
                                                    <h6 class="mb-3">Draggable Events</h6>
                                                    <div class='fc-event'>Design Review - Myra</div>
                                                    <div class='fc-event'>Project Meeting</div>
                                                    <div class='fc-event'>Weekly Review</div>
                                                    <div class='fc-event'>Planning</div>
                                                    <div class='fc-event'>Kickoff Meeting</div>
                                                </div> -->
        
                                                <!-- checkbox -->
                                                <!-- <div class="custom-control custom-checkbox mt-3">
                                                    <input type="checkbox" class="custom-control-input" id="drop-remove" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                                                </div> -->
        
                                            </div>
        
                                            <!-- <div id='calendar' class="col-lg-9 col-md-8 mt-3 mt-lg-0"></div> -->
                                            <?php 
                // if($_SESSION['level']== 'admin'){
                //     include('calendar.php');

                // }
                // else if($_SESSION['level']== 'om') {
                //     include('calendarom.php');
                // }else {
                //     include('calendaruser.php');
                // }
                
                ?>           
                                        </div>
                                        <!-- end row -->
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        
                        <!--end row-->


                        
                        <!--end row-->

                        
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
        <!-- END layout-wrapper -->


        <!-- jQuery  -->
        <script src="../template/Admin/horizontal/assets/js/jquery.min.js"></script>
        <script src="../template/Admin/horizontal/assets/js/bootstrap.bundle.min.js"></script>
        <script src="../template/Admin/horizontal/assets/js/waves.js"></script>
        <script src="../template/Admin/horizontal/assets/js/simplebar.min.js"></script>

        <!-- Sparkline Js-->
        <script src="../template/Admin/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Chart Js-->
        <script src="../template/Admin/plugins/jquery-knob/jquery.knob.min.js"></script>

        <!-- Chart Custom Js-->
        <script src="../template/Admin/horizontal/assets/pages/knob-chart-demo.js"></script>

        <!-- Morris Js-->
        <script src="../template/Admin/plugins/morris-js/morris.min.js"></script>

        <!-- Raphael Js-->
        <script src="../template/Admin/plugins/raphael/raphael.min.js"></script>

        <!-- Custom Js -->
        <script src="../template/Admin/horizontal/assets/pages/dashboard-demo.js"></script>

        <!-- App js -->
        <script src="../template/Admin/horizontal/assets/js/theme.js"></script>

        <!--calendar js-->
        <script src="../template/Admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../template/Admin/plugins/moment/moment.js"></script>
        <script src='../template/Admin/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="../template/Admin/horizontal/assets/pages/calendar-demo.js"></script>

    </body>

</html>