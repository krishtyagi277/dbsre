<?php
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();

if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 if($_POST["column_name"]=="status")
 {
 	if($value=='INT' || $value=='NI' || $value=='WCL' || $value=='NR' || $value=='NA' || $value=='WN' || $value=='NONE'){
 $query = "UPDATE dtd_record SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}else{

 echo 'Please enter only INT, NI, WCL, NR, NA, WN, NONE ';	

 }
 }
 else{
   $query = "UPDATE dtd_record SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }

    }
}
?>