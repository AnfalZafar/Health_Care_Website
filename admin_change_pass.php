<?php
include("connection.php");
$msg = "";
$email = $_GET["emailId"];
$change_pass = $_GET["change_Id"];

if(isset($_POST["change"])){
   $pass_1 = $_POST["pass_1"];
   $select = "SELECT * FROM `ad` WHERE `admin_email` = '$email' AND `reset_code` = '$change_pass' ";
   $run = mysqli_query($connect , $select);
   $num_rows = mysqli_num_rows($run);
   $fetch = mysqli_fetch_array($run);
   if($num_rows != 0){
    $update = "UPDATE `ad` SET `admin_pass`='$pass_1' WHERE `admin_email` = '$email' AND `reset_code` = '$change_pass' ";
    $fire = mysqli_query($connect , $update);
    if($fire){
        $msg = "<div class='alert alert-danger' role='alert'>
        Your Password is Change
    </div>";
    header("location:doctorsignin.php");
    }
   }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/doctor-change-pass.css">
</head>
<style>
  ::selection{
    background: rgb(98,210,162);
    color: #fff;
  }
</style>
<body>

    <div class="main">
        <div class="img">
            <img src="images/forgot.svg" alt="">
        </div>
        <div class="form">
            <div class="head">
                <h1>Change Password</h1>
            </div>
           <?php echo $msg;?>
            <form method="post">
                <div class="name">
                    <input type="password" name="pass_1" placeholder="Enter Password">
                </div>
               
                <div class="btn">
                    <button type="submit" name="change">Change Password</button>
                </div>
               
            </form>
        </div>
    </div>


</body>

</html>