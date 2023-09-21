<?php
    include_once("../Configure/connection.php");
    if (isset($_POST['clockin'])) {
        $idkaryawan = $_POST['idkaryawan'];
        $nama = $_POST['namakaryawan'];
        $waktu = $_POST['datetime'];
        $waktuout = '1/1/1111 11:11:11';


    }

    $save = "INSERT INTO absen SET id_karyawan='$idkaryawan', nama='$nama', clock_in =STR_TO_DATE('$waktu', '%d/%m/%Y %H:%i:%s'), clock_out=STR_TO_DATE('$waktuout', '%d/%m/%Y %H:%i:%s')";
    mysqli_query($db, $save);

    if ($save) {
        echo "<script>alert('Anda sudah absen untuk hari ini') </script>";
        echo "<script>window.location.href = \"clockin.php\" </script>";	
    }else{
        echo "kryptosssss";
    }

?>