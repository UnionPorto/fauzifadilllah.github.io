<?php
require ('../configure/connection.php');
require '../vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'NAMA');
$sheet->setCellValue('C1', 'BARCODE')->setFormatCode(
    '00000000000'
);
$sheet->setCellValue('D1', 'QTY');

 
$data = mysqli_query($db,"select A.Qty,A.Id_Scan,B.Nama,A.Barcode from detail_scan A INNER join item B on A.Barcode = B.Barcode");
$i = 2;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $d['Nama']);
    $sheet->setCellValue('C'.$i, $d['Barcode']);
    $sheet->setCellValue('D'.$i, $d['Qty']);
   
    $i++;
}
 
$writer = new Xlsx($spreadsheet);
$writer->save('Data karyawan.xlsx');
echo "<script>window.location = 'Data karyawan.xlsx'</script>";
 
?>