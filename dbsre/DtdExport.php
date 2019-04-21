<?php 
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();

	$filename =$_POST["filename"];
	
	
$sql = "SELECT name,profession,organization,contact,whatsappno,address,district,block,datacollection,status,dateofvisit,visittime,saved_by,created_at FROM dtd_record"; 
$setRec = mysqli_query($connect, $sql); 

$columnHeader = ''; 
$columnHeader = "Name" . "\t" . "Profession" . "\t". "Organization" . "\t". "Contact" . "\t". "What's_App_No." . "\t" . "Address" . "\t". "District" . "\t". "Block" . "\t". "Data_Collection" . "\t". "Status" . "\t". "Date_of_visit" . "\t". "Visit_Time" . "\t". "Saved_By" . "\t". "Created_At" . "\t"; 
$setData = ''; 
while ($rec = mysqli_fetch_row($setRec)) { 
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/vnd.ms-excel; charset=utf-8"); 
header("Content-Disposition: attachment; filename=".$filename.".XLS"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 

 


?>