<?php 
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();

	$filename =$_POST["filename"];

$savedby=$_SESSION['username'];


$query2='SELECT * FROM login WHERE Username LIKE "%'.$savedby.'%" ';

$result2=mysqli_query($connect,$query2);
if(mysqli_num_rows($result2)==1){
  $row2=mysqli_fetch_array($result2);
$startrow=$row2['row_start']-1;
$endrow=$row2['row_end'];
}

$count=0;	
	
	
$sql = "SELECT * FROM create_record"; 
$setRec = mysqli_query($connect, $sql); 

$columnHeader = ''; 
$columnHeader = "Id" . "\t" . "SchooName" . "\t" . "Name" . "\t". "Father's Name" . "\t". "Contact1" . "\t". "Contact2" . "\t" . "Class" . "\t". "Stream" . "\t". "Marks" . "\t". "Collected By" . "\t". "Feed By" . "\t". "Collection Date" . "\t". "Block" . "\t". "Status" . "\t". "Call_No." . "\t". "Saved_BY" . "\t". "Created_At" . "\t"; 
$setData = ''; 
while ($rec = mysqli_fetch_row($setRec)) { 
	 if($count>=$startrow && $count<$endrow)
  {
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
}
$count++;
} 
header("Content-type: application/vnd.ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=".$filename.".XLS"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 

 


?>