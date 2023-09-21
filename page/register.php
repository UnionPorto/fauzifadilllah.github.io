<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>APASMANRperpus - Register</title>
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
                                <img class="col-lg-7 rounded mx-auto d-block" src="../img/logoapas.png" alt="">
                                    <div class="col-lg-7 rounded mx-auto d-block">
                                        <div class="p-3">
                                            <div class="text-center mb-5">
                                                <br>
                                                <a href="index.html" class="text-dark font-size-22 font-family-secondary">
                                                    <i class="mdi mdi-album"></i> <b class="align-middle">HighScopePerpus</b>
                                                </a>
                                            </div>
                                            <h1 class="h5 mb-1">Create an Account!</h1>
                                            <p class="text-muted mb-4">Don't have an account? Create your own account, it takes less than a minute</p>
                                            <form method="POST" action="register.php">
                                            <div class="form-group" method="POST">
                                                <div class="container">
                                                <label>Username</label>
                                                <input class="form-control" type="text" placeholder="Insert Username" name="username" required>
                                                <br>
                                                <label>Password</label>
                                                <input class="form-control" type="password" placeholder="Insert Password" name="password" required>
                                                <br>
                                                <label>Email</label>
                                                <input class="form-control" type="text" placeholder="Insert Email" name="email" required>
                                                <br>
                                                <label>Date Of Birth</label>
                                                <input class="form-control" type="date" placeholder="Insert Date Of Birth" name="tgllhr" required>
                                                <br>
                                                <label>Gender</label>
                                                <select class="form-control" name="jeniskelamin" data-toggle="select2" required>
                                                    <option>-- Select --</option>
                                                    <optgroup label="Gender">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </optgroup>
                                                </select>
                                                <br>
                                                <label>Address</label>
                                                <input class="form-control" type="text" placeholder="Insert Address" name="alamat" required>
                                                <br>
                                                <label>Phone Number</label>
                                                <input class="form-control" type="text" placeholder="Insert Phone Number" name="notelp" required>
                                                <br>
                                                <label>Position</label>
                                                <select class="form-control" data-toggle="select2" name="jabatan" required>
                                                    <option>-- Select --</option>
                                                    <optgroup label="Position">
                                                        <option value="Guru">Guru</option>
                                                        <option value="Murid">Murid</option>
                                             
                                                    </optgroup>
                                                </select>
                                                <br>
                                                <label>Level</label>
                                                <select class="form-control" data-toggle="select2" name="tingkatan" required>
                                                    <option>-- Select --</option>
                                                    <optgroup label="Level">
                                                        <option value="admin">Admin</option>
                                                        <option value="pengunjung">Pengunjung</option>
                                                    </optgroup>
                                                </select>
                                                <br>
                                                <input class="btn btn-primary btn-block" type="submit" value="Register" name="register">
                                                <a href="login.php" class="btn btn-danger btn-block" type="button" >Back</a>
                                            </div>
                                            </form>
    
                                            <div class="row mt-4">
                                                <div class="col-12 text-center">
                                                    <p class="text-muted mb-0">Already have account?  <a href="../page/login.php" class="text-muted font-weight-medium ml-1"><b>Login</b></a></p>
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
          if(isset($_POST['register'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $tanggallahir = $_POST['tgllhr'];
            $jenkel = $_POST['jeniskelamin'];
            $address = $_POST['alamat'];
            $notelepon = $_POST['notelp'];
            $position = $_POST['jabatan'];
            $level = $_POST['tingkatan'];
    
            // include database connection file
            include_once("../configure/connection.php");
    
            // Insert user data into table
    
        try { 
           $query = "INSERT INTO login (username, password, email, tgllhr, jeniskelamin, alamat, notelp,jabatan, tingkatan, create_date) VALUES('$username','$password','$email','$tanggallahir','$jenkel','$address','$notelepon','$position','$level','CURRENT(date)')";
           $result = mysqli_query($db, $query); 
       } catch (mysqli_sql_exception $e) { 
          var_dump($e);
          exit; 
       } 
       echo "<script>Swal.fire({
        title: 'Success!',
        text: 'Successfully Register',
        icon: 'success',
        confirmButtonText: 'Cool!'
        })</script>";
        }
    
    ?>
    
        <!-- jQuery  -->
        <script src="../template/Admin/horizontal/assets/js/jquery.min.js"></script>
        <script src="../template/Admin/horizontal/assets/js/bootstrap.bundle.min.js"></script>
        <script src="../template/Admin/horizontal/assets/js/metismenu.min.js"></script>
        <script src="../template/Admin/horizontal/assets/js/waves.js"></script>
        <script src="../template/Admin/horizontal/assets/js/simplebar.min.js"></script>
    
        <!-- App js -->
        <script src="../template/Admin/horizontal/assets/js/theme.js"></script>
    
    </body>
    
    </html>