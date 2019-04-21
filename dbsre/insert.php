<?php

session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();
if(isset($_POST["schoolname"], $_POST["name"],$_POST["fname"],$_POST["contact1"],$_POST["contact2"],$_POST["class"],$_POST["stream"],$_POST["marks"],$_POST["collectedby"],$_POST["feedby"],$_POST["collectiondate"],$_POST["block"],$_POST["status"]))
{
 $schoolname = mysqli_real_escape_string($connect, $_POST["schoolname"]);
 $name = mysqli_real_escape_string($connect, $_POST["name"]);
 $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
 $contact1 = mysqli_real_escape_string($connect, $_POST["contact1"]);
 $contact2 = mysqli_real_escape_string($connect, $_POST["contact2"]);
 $class = mysqli_real_escape_string($connect, $_POST["class"]);
  $stream = mysqli_real_escape_string($connect, $_POST["stream"]);
 $marks = mysqli_real_escape_string($connect, $_POST["marks"]);
  $collectedby = mysqli_real_escape_string($connect, $_POST["collectedby"]);
   $feedby = mysqli_real_escape_string($connect, $_POST["feedby"]);
    $collectiondate = mysqli_real_escape_string($connect, $_POST["collectiondate"]);
     $block = mysqli_real_escape_string($connect, $_POST["block"]);
      $status = mysqli_real_escape_string($connect, $_POST["status"]);
 $query = "INSERT INTO create_record(schoolname,name,fname,contact1,contact2,class,stream,marks,collectedby,feedby,collectiondate,block,status) VALUES('$schoolname', '$name','$fname','$contact1','$contact2','$class','$stream','$marks','$collectedby','$feedby','$collectiondate','$block','$status')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
