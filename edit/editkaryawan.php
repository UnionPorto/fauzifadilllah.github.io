<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
</head>
<body>
    <?php 
        include_once("../Configure/connection.php");
        $idkaryawan = $_POST['id_karyawan'];
        $editkaryawan = mysqli_query($db, "SELECT * FROM karyawan WHERE id_karyawan=$idkaryawan");
        $view = mysqli_fetch_array($editkaryawan);

        if(isset($_POST['editkaryawan'])){
            $id_karyawan = $_POST['id_karyawan'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $tanggal_lahir = $_POST['tangal_lahir'];
            $jenkel = $_POST['jenkel'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];
            $jabatan = $_POST['jabatan'];
            $level = $_POST['level'];
            $query = mysqli_query($db, "UPDATE karyawan SET id_karyawan='$id_karyawan',username='$username',password='$password',nama='$nama',tgl_lhr='$tanggal_lahir',jenkel='$jenkel',alamat='$alamat',no_tel='$no_telp',jabatan='$jabatan',level='$level' WHERE id_karyawan = '$idkaryawan'");
            echo "   <script>  Swal.fire({
                title: 'Success!',
                text: 'Successfully Edit Karyawan',
                icon: 'success',
                confirmButtonTex :'Oke!'
            });  
                setTimeout(function(){window.location='../add/addkaryawan.php'} , 2000);
        
                </script>";
        }
            ?>
    
</body>
</html>