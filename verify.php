<?php
include("connection.php");
    $emailId = $_GET["emailId"];
    $v_codeId = $_GET["v_codeId"];

    $select = "SELECT * FROM `sign_table` WHERE `sign_email`='$emailId' AND `verifi_code`='$v_codeId' ";
    $run = mysqli_query($connect, $select);

    if ($run) {
        if(mysqli_num_rows($run) == 1){
       $fetch = mysqli_fetch_array($run);
       if($fetch["is_verifi"] == 0){
        
        $update = "UPDATE `sign_table` SET `is_verifi`='1' WHERE `sign_email` = '$emailId' " ;
       if(mysqli_query($connect , $update)){
        echo "
        <script>
        alert('Email Verification Successfull');
        </script>";
        header("location:signin.php");
       }
       }else {
        echo "
        <script>
        alert('User Already Resigtered');
        </script>";
    }


}else {
        echo "
        <script>
        alert('Query Not Run');
        </script>";
    }
}
 
?>