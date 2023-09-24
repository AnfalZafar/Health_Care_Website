<?php
include("connection.php");
$msg = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email , $change_pass){

    
    //Load Composer's autoloader
    require 'phpmiller/PHPMailer.php';
    require 'phpmiller/SMTP.php';
    require 'phpmiller/Exception.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anfalzafar533@gmail.com';                     //SMTP username
        $mail->Password   = 'stuznfipwqqqsanu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('anfalzafar533@gmail.com', 'Health Care');
        $mail->addAddress($email);     //Add a recipient
    
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Health Care';
        $mail->Body    = "Click below the link to Registration<br>
        <h3>   
        <a href='http://localhost/health/admin_change_pass.php?emailId=$email&change_Id=$change_pass' >Reset Your Password</a>    
        </h3>
        ";
         $mail->send();

    } catch (Exception $e) {
        echo("Not Work");
    }

}

if(isset($_POST["reset"])){
    $email = $_POST["d_email"];
    $select = "SELECT * FROM `ad` WHERE `admin_email` = '$email' ";
    $run = mysqli_query($connect , $select);
    $num_rows = mysqli_num_rows($run);
    $fetch = mysqli_fetch_array($run);
    if($num_rows != 0){
      if($fetch["admin_email"] == $email){
      $change_pass = bin2hex(random_bytes(16));
      $update = "UPDATE `ad` SET `reset_code`='$change_pass' WHERE `admin_email` = '$email' ";
      if(mysqli_query($connect , $update) && sendmail($email , $change_pass)){
        echo"<script>
            alert('Reset Password Verification is send your Email');
            </script>"; 
      }
      }
      
    }else{
        $msg = "<div class='alert alert-danger' role='alert'>
        Invalid Email
    </div>";
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
    <link rel="stylesheet" href="css/doctorforgot.css">
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
            <img src="images/doctor_forgot.svg" alt="">
        </div>
        <div class="form">
            <div class="head">
                <h1>Forgot Password</h1>
            </div>
            <?php echo $msg;?>
            <form method="post">
                <div class="name">
                    <input type="email" name="d_email" placeholder="Enter Email">
                </div>
                <div class="btn">
                    <button type="submit" name="reset">Send Resent Link</button>
                </div>
                <div class="back">
                    <h6>Go Bake to <a href="admin_signin.php">Sign In</a></h6>
                </div>

            </form>
        </div>
    </div>


</body>

</html>