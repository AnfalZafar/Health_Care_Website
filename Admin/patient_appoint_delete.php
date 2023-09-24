<?php
include("../connection.php");
$get = $_GET["delete"];
$delete = "DELETE FROM `patient_appointment_table` WHERE `patient_appointment_table`.`patient_id` = $get";
$run = mysqli_query($connect , $delete);
if($run){
    header("location:patient-appoint.php");
}


?>