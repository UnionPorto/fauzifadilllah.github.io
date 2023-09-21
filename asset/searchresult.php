<?php
require ('../configure/connection.php');
$return = '';
if(isset($_POST["query1"]))
{
	$search = mysqli_real_escape_string($db, $_POST["query1"]);
	$query = "SELECT * FROM item
	WHERE id  LIKE '%".$search."%'
	OR Barcode LIKE '%".$search."%' 
	OR Nama LIKE '%".$search."%' 
	OR Deskripsi LIKE '%".$search."%' 
	";}
else
{ 
    $query = 'select * from employee where id = NULL '
	?>

<div class="form-group mb-3">
            <label for="">Nama</label>
            <input type="text" value="" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Qty</label>
            <input type="text" value="" class="form-control">
        </div>
        <?php
}
$result = mysqli_query($db, $query);

if(mysqli_num_rows($result) > 0)
{

    foreach($result as $row)
    {
        ?>
        
      
 <div class="form-group mb-3">
            <label for="">Nama</label>
            <input type="text" value="<?= $row['Nama']; ?>" name="NamaItem" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Qty</label>
            <input type="text" name="Qty" class="form-control">
        </div>
        <div class="form-group mb-3">
          
        <input class="btn btn-primary btn-block" type="submit" value="Simpan" id="tambahdetail" name="tambahdetail">
        </div>
  
        <?php
    }
}
else
{
    echo "No Record Found";
}

?>
