<?php
include("../connection.php");
$ge = $_GET["deleteId"];
$delete = "DELETE FROM `doctors_table` WHERE `doctors_table`.`doctor_id` = $ge";
$run = mysqli_query($connect , $delete);
if($run){
    header("location:doctor.php");
    echo "
    <script>
    alert('Data Deleted');
    </script>
    ";
}

?>