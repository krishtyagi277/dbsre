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

 $query = "UPDATE login SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'User Updated';
 }

}
?>