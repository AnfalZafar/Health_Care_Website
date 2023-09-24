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

function sendmail($email, $v_code)
{

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
        $mail->Password   = 'pdygitcpfufrthqz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('anfalzafar533@gmail.com', 'Health Care');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Health Care';
        $mail->Body    = "Thanks For Registration Doctor<br>
    Click below the link to Registration<br>
    <h3>   
    <a href='http://localhost/health/adminverifi.php?emailId=$email&v_codeId=$v_code' >Verify</a>    
    </h3>
    ";


        $mail->send();
        return true;
    } catch (Exception $e) {
        echo ("not verify");
    }
}
if (isset($_POST["a_signup"])) {
    $name = $_POST["a_name"];
    $email = $_POST["a_email"];
    $pass = $_POST["a_pass"];
    $phone = $_POST["a_num"];
    $location = $_POST["a_location"];
    $img_type = $_FILES["a_img"]["type"];
    if(strtolower($img_type) == "image/png" || strtolower($img_type) == "image/jpg" || strtolower($img_type) == "image/jpeg" ){
      $img_name = $_FILES["a_img"]["name"];
      $target = "Admin/img/" .basename($img_name);
      if(move_uploaded_file($_FILES["a_img"]["tmp_name"] , $target)){
        $select = "SELECT * FROM `ad` WHERE `admin_name` = '$name' OR `admin_email` = '$email'";
        $run = mysqli_query($connect, $select);
        if ($run) {
            if (mysqli_num_rows($run) != 0)  #if user have already taken their name or email
            {
                $result_fetch = mysqli_fetch_array($run);
                if ($result_fetch["admin_name"] == $name)   #if user name is already taken
                {
                    $msg = "
                <div class='alert alert-danger' role='alert'>
                User Name is already taken
              </div>
                ";
                } else   #if user email is already taken
                {
                    $msg = "
                <div class='alert alert-danger' role='alert'>
                Email is already taken
              </div>
                ";
                }
            } else   #if no one enter name or email
            {
                if (empty($name) || empty($email) || empty($pass) || empty($phone) || empty($location)) {
                    echo "<script>
                alert('Please Fil All the input');
                </script>";
                } else {
                    $v_code = bin2hex(random_bytes(16));
                    $insert = "INSERT INTO `ad`(`admin_name`,`admin_email`,`admin_phone`,`admin_location`,`admin_pass`,`admin_img`,`verifi_code`, `is_verifi`) VALUES ('$name','$email','$phone','$location','$pass','$img_name','$v_code','0')";
                    if (mysqli_query($connect, $insert) && sendmail($email, $v_code)) {
                        echo "<script>
                alert('Verification Code is send to your Gmail');
                </script>";
                    }
                }
            }
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
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="css/doctorsignup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
            <img src="images/adminsignup.jpg" alt="">
        </div>
        <div class="form">
            <form method="post" enctype="multipart/form-data">

                <div class="name_email">
                    <div class="head">
                        <h1>Information</h1>
                    </div>
                    <div class="name">
                        <input type="text" name="a_name" class="name_input" placeholder="Enter Name" required>
                    </div>
                    <div class="name">
                        <input type="email" name="a_email" class="email_input" placeholder="Enter Email" required>
                    </div>
                    <div class="name_btn">
                        <button class="next_1">Next</button>
                    </div>
                </div>

                <div class="phone_pass">
                    <div class="head">
                        <h1>Security</h1>
                    </div>
                    <div class="pass">
                        <input type="password" name="a_pass" placeholder="Enter Password" required>
                    </div>
                    <div class="pass">
                        <input type="text" name="a_num" placeholder="Enter Phone Number" required>
                    </div>
                    <div class="phone_btn">
                        <button class="back_2">Back</button>
                        <button class="next_2">Next</button>
                    </div>
                </div>

                <div class="location_skill">
                    <div class="head">
                        <h1>Skills</h1>
                    </div>
                    <div class="skill">
                        <input type="text" name="a_location" placeholder="Enter Your Location" required>
                    </div>
                    
                    <div class="skill">
                    <div class="input-group w-100 h-100">
                        <input type="file" name="a_img" class="form-control" id="inputGroupFile01">
                    </div>
                    </div>
                    <div class="signup">
                        <button class="back_3">Back</button>
                        <button type="submit" name="a_signup">Sign Up</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



    <script>
        let name_btn = document.querySelector(".next_1"),
            phone_btn = document.querySelector(".next_2"),
            back_1 = document.querySelector(".back_1"),
            back_2 = document.querySelector(".back_2"),
            back_3 = document.querySelector(".back_3"),
            name_input = document.querySelector(".name_input"),
            email_input = document.querySelector(".email_input"),
            name_email = document.querySelector(".name_email"),
            phone_pass = document.querySelector(".phone_pass"),
            location_skill = document.querySelector(".location_skill");


        name_btn.addEventListener("click", function(e) {
            e.preventDefault();
            // name_email.classList.add("hide_1");
            // phone_pass.classList.add("show_2");
            name_email.style.display = "none";
            phone_pass.style.display = "flex";
        })
        back_2.addEventListener("click", function(e) {
            e.preventDefault();
            // name_email.classList.add("hide_1");
            // phone_pass.classList.add("show_2");
            name_email.style.display = "flex";
            phone_pass.style.display = "none";
        });

        phone_btn.addEventListener("click", function(e) {
            e.preventDefault();
            // name_email.classList.add("hide_1");
            // phone_pass.classList.add("show_2");
            phone_pass.style.display = "none";
            location_skill.style.display = "flex";
        });
        back_3.addEventListener("click", function(e) {
            e.preventDefault();
            // name_email.classList.add("hide_1");
            // phone_pass.classList.add("show_2");
            phone_pass.style.display = "flex";
            location_skill.style.display = "none";
        });
    </script>




</body>

</html>