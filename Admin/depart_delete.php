<?php
include("../connection.php");
$ge = $_GET["deletedepart"];
$delete = "DELETE FROM `depart_table` WHERE `depart_table`.`depart_id` = $ge";
$run = mysqli_query($connect , $delete);
if($run){
    header("location:depart.php");
    echo "
    <script>
    alert('Data Deleted');
    </script>
    ";
}

?>

?>