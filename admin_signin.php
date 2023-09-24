<?php
include("connection.php");
$msg = "";
session_start();
if((isset($_SESSION["a_email"]))){
    header("location:Admin/index.php");
}


if(isset($_POST["login"])){
    $email = $_POST["a_email"];
    $pass = $_POST["a_pass"];
    $select = "SELECT * FROM `ad` WHERE `admin_email` = '$email' and `admin_pass` = '$pass'";
    $run = mysqli_query($connect , $select);
    $num_row = mysqli_num_rows($run);
    $fetch = mysqli_fetch_array($run);
    if($num_row != 0){
        if($fetch["is_verifi"] == "1"){
            $_SESSION["a_email"] = $fetch["admin_email"];
        $_SESSION["a_name"] = $fetch["admin_name"];
        $_SESSION["admin_img"] = $fetch["admin_img"];
        $_SESSION["a_location"] = $fetch["admin_location"];
        $_SESSION["a_contact"] = $fetch["admin_phone"];
        $_SESSION["v_code"] = $fetch["verifi_code"];
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
    <title>Sign Up</title>
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
            <img src="images/adminlogin.jpg" alt="">
        </div>
        <div class="form">
            <form method="post">

                <div class="name_email">
                    <div class="head">
                        <h1>Welcome Again</h1>
                    </div>                  
                    <div class="name">
                        <input type="email" name="a_email" class="email_input" placeholder="Enter Email" required>
                    </div>
                    <div class="name">
                        <input type="password" name="a_pass" class="email_input" placeholder="Enter Password" required>
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