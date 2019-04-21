<?php
//fetch.php
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();
$savedby=$_SESSION['username'];


$query2='SELECT * FROM login WHERE Username LIKE "%'.$savedby.'%" ';

$result2=mysqli_query($connect,$query2);
if(mysqli_num_rows($result2)==1){
  $row2=mysqli_fetch_array($result2);
$startrow=$row2['row_start']-1;
$endrow=$row2['row_end'];
}

$stat =$_POST["status"];
$query = "SELECT * FROM create_record ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE schoolname LIKE "%'.$_POST["search"]["value"].'%" 
 OR name LIKE "%'.$_POST["search"]["value"].'%"
  OR fname LIKE "%'.$_POST["search"]["value"].'%" 
  OR contact1 LIKE "%'.$_POST["search"]["value"].'%"
  OR contact2 LIKE "%'.$_POST["search"]["value"].'%"
   OR class LIKE "%'.$_POST["search"]["value"].'%"
 OR stream LIKE "%'.$_POST["search"]["value"].'%"
  OR marks LIKE "%'.$_POST["search"]["value"].'%"
 OR collectedby LIKE "%'.$_POST["search"]["value"].'%"
 OR feedby LIKE "%'.$_POST["search"]["value"].'%"
 OR collectiondate LIKE "%'.$_POST["search"]["value"].'%"
 OR block LIKE "%'.$_POST["search"]["value"].'%"
  OR status LIKE "%'.$_POST["search"]["value"].'%"



 ';
}



$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

$count=0;

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
   if($count>=$startrow && $count<$endrow){
 if( $row["status"]===$stat||$row["class"]===$stat){
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="schoolname">' . $row["schoolname"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="fname">' . $row["fname"] . '</div>';
  
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contact1">' . $row["contact1"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contact2">' . $row["contact2"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="class">' . $row["class"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="stream">' . $row["stream"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="marks">' . $row["marks"] . '</div>';


  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="collectedby">' . $row["collectedby"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="feedby">' . $row["feedby"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="collectiondate">' . $row["collectiondate"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="block">' . $row["block"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="status">' . $row["status"] . '</div>'; 
   $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="call_no">' . $row["call_no"] . '</div>'; 
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}
}
  if($endrow==null){
  if( $row["status"]===$stat||$row["class"]===$stat){
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="schoolname">' . $row["schoolname"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="fname">' . $row["fname"] . '</div>';
  
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contact1">' . $row["contact1"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contact2">' . $row["contact2"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="class">' . $row["class"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="stream">' . $row["stream"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="marks">' . $row["marks"] . '</div>';


  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="collectedby">' . $row["collectedby"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="feedby">' . $row["feedby"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="collectiondate">' . $row["collectiondate"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="block">' . $row["block"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="status">' . $row["status"] . '</div>'; 
   $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="call_no">' . $row["call_no"] . '</div>'; 
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}


}
$count++;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM create_record ";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
