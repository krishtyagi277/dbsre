<?php


function openCon(){

$connect = mysqli_connect("localhost", "root", "", "dbManagement");

return $connect;
}

function closeCon($connect){

	mysqli_close($connect);
}

?>