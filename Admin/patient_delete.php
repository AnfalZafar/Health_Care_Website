<?php
include("../connection.php");

$get = $_GET["deleteId"];
$delete = "DELETE FROM `sign_table` WHERE `sign_table`.`sign_id` = $get";
$run = mysqli_query($connect , $delete);
if($run){
    header("location:patient-detail.php");
}

?>