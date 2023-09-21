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
            $id = $_GET['id'];
            // $query1 = mysqli_query($db, "SELECT status FROM asset where id = '$id'");
            // $data1 = mysqli_fetch_array($query1);
          
            // echo $data1['status'];
            // if($data1['status']==''){
            //     echo "<script> Swal.fire({
            //         title: 'Success!',
            //         text: 'Tidak Bisa Dikembalikan Karena Status Pending',
            //         icon: 'success',
            //         confirmButtonTex :'Oke!'
            //     });  
            //         setTimeout(function(){window.location='../asset/read.php'} , 2000);
            
            //         </script>";
            // }else{
                $query = mysqli_query($db, "update asset set status = 'Pending',description = '',tanggal_approve = CURRENT_DATE() WHERE id='$id'");
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