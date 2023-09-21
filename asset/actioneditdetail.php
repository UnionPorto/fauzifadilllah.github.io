<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update status</title>
</head>
<body>
    <?php 
            include_once("../Configure/connection.php");
            $id = $_POST['idassetdetail'];
            $kode_asset_detail = $_POST['kode_asset_detail'];
            $namabarang = $_POST['namabarang'];
            $quantity = $_POST['quantity'];
            $deskrip = $_POST['deskrip'];


            $query = mysqli_query($db, "update asset_detail set kode_asset_detail = '$kode_asset_detail',barang = '$namabarang',qty = '$quantity',deskripsi = '$deskrip' WHERE id='$id'");
            echo "<script> Swal.fire({
                title: 'Success!',
                text: 'Successfully update asset',
                icon: 'success',
                confirmButtonTex :'Oke!'
            });  
                setTimeout(function(){window.location='../asset/read.php'} , 2000);
        
                </script>";
                ?>
</body>
</html>