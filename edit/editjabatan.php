<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jabatan</title>
</head>
<body>
    <?php 
        include_once("../Configure/connection.php");
        $id = $_POST['id_jabatan'];
        // $editjabatan = mysqli_query($db, "SELECT * FROM jabatan WHERE id=$id");
        // $view = mysqli_fetch_array($editjabatan);

        if(isset($_POST['editjabatan'])){
            $jabatan = $_POST['jabatan1'];
            $query = mysqli_query($db, "UPDATE jabatan SET jabatan_karyawan='$jabatan' WHERE id = '$id'");
            echo "   <script>  Swal.fire({
                title: 'Success!',
                text: 'Successfully Edit Jabatan',
                icon: 'success',
                confirmButtonTex :'Oke!'
            });  
                setTimeout(function(){window.location='../add/addjabatan.php'} , 2000);
        
                </script>";
        }
            ?>
    
</body>
</html>