<?php
include("connection.php");
    $emailId = $_GET["emailId"];
    $v_codeId = $_GET["v_codeId"];

    $select = "SELECT * FROM `ad` WHERE `admin_email`='$emailId' AND `verifi_code`='$v_codeId' ";
    $run = mysqli_query($connect , $select);

    if ($run) {
        if(mysqli_num_rows($run) == 1){
       $fetch = mysqli_fetch_array($run);
       if($fetch["is_verifi"] == 0){
        
        $update = "UPDATE `ad` SET `is_verifi`='1' WHERE `admin_email` = '$emailId' " ;
       if(mysqli_query($connect , $update)){
       
        header("location:admin_signin.php");
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