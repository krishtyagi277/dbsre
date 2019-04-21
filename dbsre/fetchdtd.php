<?php
//fetch.php
/*<div contenteditable class="update" data-id="'.$row["id"].'" data-column="status">' . $row["status"] . '</div>*/
session_start();

if(empty($_SESSION['username'])){
  header("Location:index.php");

}
include 'connect_db.php';
$connect = openCon();
$savedby=$_SESSION['username'];
$query = "SELECT * FROM dtd_record ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE name LIKE "%'.$_POST["search"]["value"].'%" 
 OR profession LIKE "%'.$_POST["search"]["value"].'%"
  OR organization LIKE "%'.$_POST["search"]["value"].'%" 
  OR contact LIKE "%'.$_POST["search"]["value"].'%"
  OR whatsappno LIKE "%'.$_POST["search"]["value"].'%"
   OR address LIKE "%'.$_POST["search"]["value"].'%"
 OR district LIKE "%'.$_POST["search"]["value"].'%"
  OR block LIKE "%'.$_POST["search"]["value"].'%"
 OR datacollection LIKE "%'.$_POST["search"]["value"].'%"
 OR status LIKE "%'.$_POST["search"]["value"].'%"
 OR dateofvisit LIKE "%'.$_POST["search"]["value"].'%"
 OR visittime LIKE "%'.$_POST["search"]["value"].'%"
  

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
$totalrecord=0;

while($row = mysqli_fetch_array($result))
{ 
  $cmp=strcasecmp(ltrim($savedby), ltrim($row["saved_by"]));
if($cmp==0) {
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="name">' . $row["name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="profession">' . $row["profession"] . '</div>';
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="organization">' . $row["organization"] . '</div>';
  
  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="contcat">' . $row["contact"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="whatsappno">' . $row["whatsappno"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="address">' . $row["address"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="district">' . $row["district"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="block">' . $row["block"] . '</div>';


  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="datacollection">' . $row["datacollection"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="status">' . $row["status"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="dateofvisit">' . $row["dateofvisit"] . '</div>';

  $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="visittime">' . $row["visittime"] . '</div>';
 
 $data[] = $sub_array;
}

  
}


function get_all_data($connect)
{
 $query = "SELECT * FROM dtd_record";
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
