<?php 
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();

	$filename =$_POST["filename"];
	
	
$sql = "SELECT * FROM create_record"; 
$setRec = mysqli_query($connect, $sql); 

$columnHeader = ''; 
$columnHeader =  "S.No." . "\t" ."SchooName" . "\t" . "Name" . "\t". "Father's Name" . "\t". "Contact1" . "\t". "Contact2" . "\t" . "Class" . "\t". "Stream" . "\t". "Marks" . "\t". "Collected By" . "\t". "Feed By" . "\t". "Collection Date" . "\t". "Block" . "\t". "Status" . "\t". "Call_No." . "\t". "Saved_By" . "\t". "Created_By" . "\t"; 
$setData = ''; 
$sno=1;
while ($rec = mysqli_fetch_row($setRec)) { 
$rowData = ''; 
$i=0;
foreach ($rec as $value) { 
if($i==0)//this condition is checking the first column and print the suitable row no. mainly used for as a replace for id column in database.
{	$value = $sno++;
$value = '"' . $value . '"' . "\t";
}
else
$value = '"' . $value . '"' . "\t";

$rowData .= $value; 
$i++;//value of i has changed after the first column.
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/vnd.ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=".$filename.".XLS"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 

 


?>