<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Invent - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../img/logoinvent.png">

    <!-- App css -->
    <link href="../template/Admin/vertical/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/vertical/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../template/Admin/vertical/assets/css/theme.min.css" rel="stylesheet" type="text/css" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
 
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                
                                <img class="w-25 p-3 mx-auto my-5 h-25" src="../img/logoinvent.png" alt="">
                                <div class="col-lg-7 rounded mx-auto d-block">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="index.html" class="text-dark font-size-22 font-family-secondary">
                                                <i class="mdi mdi-album"></i> <b class="align-middle">Inventory</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Login an Account!</h1>
                                        <p class="text-muted mb-4">Enter your Username and password to access admin panel.</p>
                                        
                                        <form class="user" method="post" action="../configure/authentication.php">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Insert Username" name="Username">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Insert Password" name="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Login</button>
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                
                                                <p class="text-muted mb-0">Don't have an account? <a href="#" class="text-muted font-weight-medium ml-1"><b>Register</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->

                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <?php
    if(isset($_GET['error'])){
    $x = ($_GET['error']);
        if($x==1){
        echo "<script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'error',
            title: 'Username atau Password Salah.'
        })</script>";
        }
        else if($x==2){
        echo "<script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'warning',
            title: 'Username atau Password Belum Diisi.'
        })</script>";
        }
        else {
        echo '';
        }
    }
?>

    <!-- jQuery  -->
    <script src="../template/Admin/vertical/assets/js/jquery.min.js"></script>
    <script src="../template/Admin/vertical/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../template/Admin/vertical/assets/js/metismenu.min.js"></script>
    <script src="../template/Admin/vertical/assets/js/waves.js"></script>
    <script src="../template/Admin/vertical/assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="../template/Admin/vertical/assets/js/theme.js"></script>

</body>

</html>