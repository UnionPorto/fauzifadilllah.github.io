<div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                            
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../page/dashboard.php">
                                            <i class="mdi mdi-home-analytics"></i>Dashboard
                                        </a>
                                    </li>
                           
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
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../asset/read.php" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-account-group"></i>Scan Asset<div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="../asset/readadmin.php" class="dropdown-item">Lihat </a>
                                            <a href="../asset/add.php?id=<?php echo $kode_asset; ?>" class="dropdown-item">Tambah</a>
                                        </div>
                                    </li>
                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../outlet/read.php" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-account-group"></i>Data Outlet <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="../outlet/read.php" class="dropdown-item">Lihat outlet</a>
                                            <a href="../outlet/add.php" class="dropdown-item">Tambah outlet</a>
                                        </div>
                                    </li> -->
                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../outlet/read.php" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-account-group"></i>Data Peminjaman Dan Pengembalian<div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="../asset/read1.php" class="dropdown-item">Lihat Peminjaman</a>
                                            <a href="../asset/read1.php" class="dropdown-item">Lihat Pengembalian</a>
                                            <a href="../asset/add1.php" class="dropdown-item">Tambah Peminjaman</a>
                                            <a href="../asset/add1.php" class="dropdown-item">Tambah Pengembalian</a>
                                        </div>
                                    </li> -->
                                    

                                 <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../add/addguru.php" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-finance"></i>Data guru 
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../buku/read.php" id="topnav-pages" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-calendar-multiple-check"></i>Data buku <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-pages">
                                            <a href="../buku/read.php" class="dropdown-item">Lihat buku</a>
                                            <a href="../buku/add.php" class="dropdown-item">Tambah buku</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../transaksi/read.php" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-calendar-text"></i>Data Pinjam Buku 
                                        </a>
                                    </li> -->

                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="../page/reportadmin.php" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-book-open"></i>Report 
                                        </a>
                                    </li>  -->

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>