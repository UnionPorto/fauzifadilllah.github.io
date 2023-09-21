<?php require ('../configure/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Export Data ke Excel Dengan PHP dan MySQLi</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
 
</head>
<body>
	<div class="container">
		<center><h2>Export Data ke Excel Dengan PHP dan MySQLi</h2></center>
		<br>
                <div class="float-right">
		        <a href="export_excel.php" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> &nbsp Excel</a>
			<br>
			<br>
		</div>
		<table class="table table-bordered">
			<thead>				
				<tr>
					<th style="text-align: center;">Nomor</th>
					<th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Barcode</th>
                    <th style="text-align: center;">Qty</th>
				
				</tr>				
			</thead>
			<tbody>
				<?php
				$no=1;
				$data = mysqli_query($db,"select A.Qty,A.Id_Scan,B.Nama,A.Barcode from detail_scan A INNER join item B on A.Barcode = B.Barcode");
				while($d = mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['Nama'] ?></td>
						<td><?php echo $d['Barcode'] ?></td>
						<td><?php echo $d['Qty'] ?></td>
									
					</tr>
					<?php
				}
				?>				
			</tbody>
		</table>
	</div>
	
	
</body>
</html>