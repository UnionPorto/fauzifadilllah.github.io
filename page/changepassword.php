<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Password</title>
</head>
<body>
    <?php 
            include_once("../Configure/connection.php");
            $id = $_POST['iduserr'];
            $passwordlama = $_POST['passwordlama'];
            $passwordbaru = $_POST['passwordbaru'];
           


           


                $query1 = mysqli_query($db,"SELECT * FROM login WHERE password='$passwordlama'");

    if( mysqli_num_rows($query1)==1 ){
       
        $query = mysqli_query($db, "update login set password = '$passwordbaru' WHERE id='$id'");
            echo "<script> Swal.fire({
                title: 'Success!',
                text: 'Successfully update password',
                icon: 'success',
                confirmButtonTex :'Oke!'
            });  
                setTimeout(function(){window.location='logout.php'} , 2000);
        
                </script>";


    }
    
    else{
        echo "<script> Swal.fire({
            title: 'Error!',
            text: 'Failed update password',
            icon: 'error',
            confirmButtonTex :'Oke!'
        });  
            setTimeout(function(){window.location='dashboard.php'} , 2000);
    
            </script>";
    }
                ?>
</body>
</html>