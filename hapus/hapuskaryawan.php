<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Karyawan</title>
</head>
<body>
    <?php 
            include_once("../Configure/connection.php");
            $idkaryawan = $_GET['id_karyawan'];

            $query = mysqli_query($db, "DELETE FROM karyawan WHERE Id_Karyawan='$idkaryawan'");
            echo "<script> Swal.fire({
                title: 'Success!',
                text: 'Successfully Hapus Karyawan',
                icon: 'success',
                confirmButtonTex :'Oke!'
            });  
                setTimeout(function(){window.location='../add/addkaryawan.php'} , 2000);
        
                </script>";
                ?>
</body>
</html>