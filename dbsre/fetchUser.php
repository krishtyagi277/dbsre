<?php
//fetch.php
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();
$savedby=$_SESSION['username'];
$query = "SELECT * FROM login ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE Username LIKE "%'.$_POST["search"]["value"].'%" 
 OR Created_at LIKE "%'.$_POST["search"]["value"].'%"
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

while($row = mysqli_fetch_array($result))
{ if($row["Type"]=="user"){
 $sub_array = array();

  $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="Username">' . $row["Username"] . '</div>'; 

  $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="Password">' . $row["Password"] . '</div>';

  $sub_array[] = '<div class="update" data-id="'.$row["id"].'" data-column="Created_at">' . $row["Created_at"] . '</div>'; 
   
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>';
 $data[] = $sub_array;
}

}

function get_all_data($connect)
{
 $query = "SELECT * FROM login";
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
