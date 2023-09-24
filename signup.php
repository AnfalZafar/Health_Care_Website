<?php
include("connection.php");
$msg = "";
session_start();
// if((isset($_SESSION["email"]))){
//     header("location:web.php");
// }

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email , $v_code){

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
    $mail->Password   = 'nnjaohkyzmdcpwct';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('anfalzafar533@gmail.com', 'Health Care');
    $mail->addAddress($email);     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification from Health Care';
    $mail->Body    = "Thanks For Registration <br>
    Click below the link to Registration<br>
    <h3>   
    <a href='http://localhost/health/verify.php?emailId=$email&v_codeId=$v_code' >Verify</a>    
    </h3>
    ";


    $mail->send();
    return true;
} catch (Exception $e) {
   echo("not verify");
}
}
if(isset($_POST["signup"])){
    $name = $_POST["signupname"];
    $email = $_POST["signupemail"];
    $pass = $_POST["signuppass"];
    $phone = $_POST["signupphone"];
    $select = "SELECT * FROM `sign_table` WHERE `sign_name` = '$name' OR `sign_email` = '$email'";
    $run = mysqli_query($connect , $select);
    if($run){
        if(mysqli_num_rows($run) != 0)  #if user have already taken their name or email
        {
         $result_fetch = mysqli_fetch_array($run);
         if($result_fetch["sign_name"] == $name)   #if user name is already taken
         {      
            $msg = "
            <div class='alert alert-danger' role='alert'>
            User Name is already taken
          </div>
            ";  
         }else   #if user email is already taken
         {      
            $msg = "
            <div class='alert alert-danger' role='alert'>
            Email is already taken
          </div>
            ";  
        
              
         }
        }else   #if no one enter name or email
        {
         $v_code = bin2hex(random_bytes(16));
         $insert = "INSERT INTO `sign_table`(`sign_name`, `sign_email`,`sign_phone`, `sign_pass`,`verifi_code`, `is_verifi`) VALUES ('$name','$email','$phone' ,'$pass','$v_code','0')";
         if(mysqli_query($connect , $insert)&& sendmail($email , $v_code)){
            $msg = "
            <div class='alert alert-info' role='alert'>
            Verification Code is send to you
           </div>
            ";  
          // header("location:signup.php");
      } 
         
        }


}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care</title>
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="prac.css">
</head>

<body>
    <img class="wave_img" src="images/wave.png" alt="">
    <div class="main">
        <div class="main_img">
            <img src="images/2img.svg" alt="">
        </div>
        <form method="post">
            <div class="form_head">
                <img src="images/avatar (1).svg" alt="">
                <h1>User Sign Up</h1>
            </div>
            <div class="alert">
            <?php echo$msg;?>
            </div>
            <div class="name">
                <label for="name" id="label"><i class="fa-solid fa-user"></i></label>
                <input type="text" id="input" name="signupname" placeholder="User Name" required>
            </div>
            <div class="name">
                <label for="name" id="label_2"><i class="fa-solid fa-envelope"></i></label>
                <input type="email" id="input_2" name="signupemail" placeholder="Email" required>
            </div>
            <div class="name">
                <label for="name" id="label_4"><i class="fa-solid fa-phone"></i></label>
                <input type="number" id="input_4" name="signupphone" placeholder="Enter Phone Number" required>
            </div>
            <div class="name">
                <label for="name" id="label_3"><i class="fa-solid fa-lock"></i></label>
                <input type="password" id="input_3" name="signuppass" placeholder="Password" required>
            </div>
            <div class="gosignin">
                <h6>Already have an account</h6>
                <h6><a href="signin.php">Sign In</a></h6>
            </div>
            <div class="btn">
                <button type="submit" class="input" name="signup">Sign Up</button>
            </div>

        </form>
    </div>

    <script>
    let input = document.getElementById("input");
    let label = document.getElementById("label");
    let input_2 = document.getElementById("input_2");
    let label_2 = document.getElementById("label_2");
    let input_3 = document.getElementById("input_3");
    let label_3 = document.getElementById("label_3");
    let input_4 = document.getElementById("input_4");
    let label_4 = document.getElementById("label_4");

    input.addEventListener('input', () => {
        if (input.value.trim() !== '') {
            label.style.color = 'rgb(98,210,162)';
        } else {
            label.style.color = 'rgb(233, 233, 233)';

        }


    });
    input_2.addEventListener('input', () => {
        if (input_2.value.trim() !== '') {
            label_2.style.color = 'rgb(98,210,162)';
        } else {
            label_2.style.color = 'rgb(233, 233, 233)';

        }


    });
    input_4.addEventListener('input', () => {
        if (input_4.value.trim() !== '') {
            label_4.style.color = 'rgb(98,210,162)';
        } else {
            label_4.style.color = 'rgb(233, 233, 233)';

        }


    });
    input_3.addEventListener('input', () => {
        if (input_3.value.trim() !== '') {
            label_3.style.color = 'rgb(98,210,162)';
        } else {
            label_3.style.color = 'rgb(233, 233, 233)';

        }


    });
    </script>

</body>

</html>