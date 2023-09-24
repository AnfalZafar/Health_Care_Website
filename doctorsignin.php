<?php
include("connection.php");
$msg = "";
session_start();
if((isset($_SESSION["d_email"]))){
    header("location:Admin/index.php");
}


if(isset($_POST["login"])){
    $email = $_POST["d_email"];
    $pass = $_POST["d_pass"];
    $select = "SELECT * FROM `doctors_table` WHERE `doctor_gmail` = '$email' and `doctor_pass` = '$pass'";
    $run = mysqli_query($connect , $select);
    $num_row = mysqli_num_rows($run);
    $fetch = mysqli_fetch_array($run);
    if($num_row != 0){
        if($fetch["is_verifi"] == "1"){
            $_SESSION["d_email"] = $fetch["doctor_gmail"];
        $_SESSION["d_name"] = $fetch["doctor_name"];
        $_SESSION["d_v_code"] = $fetch["doctor_code"];
        header("location:Admin/index.php");

        }else{
            echo"<script>
            alert('Regestered your Email');
            </script>"; 
    }

    } else #if email and password is not match
    {
        $msg = "
        <div class='alert alert-danger' role='alert'>
        Enter Correct Email OR Password
      </div>
        
            ";
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="css/doctorsignin.css">
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
            <img src="images/Administrative-Virtual-Assistants-Everything-You-Need-To-Know-1024x554.png" alt="">
        </div>
        <div class="form">
            <form method="post">

                <div class="name_email">
                    <div class="head">
                        <h1>Welcome Again</h1>
                    </div>                  
                    <div class="name">
                        <input type="email" name="d_email" class="email_input" placeholder="Enter Email" required>
                    </div>
                    <div class="name">
                        <input type="password" name="d_pass" class="email_input" placeholder="Enter Password" required>
                    </div>
                    <div class="forgot">
                        <a href="admin_forgot.php">Forget Password?</a>
                    </div>
                    <div class="name_btn">
                        <button type="submit" name="login">Log In</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



 

</body>

</html>