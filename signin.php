<?php
include("connection.php");
$msg = "";
session_start();
// if((isset($_SESSION["email"]))){
//     header("location:web.php");
// }


if(isset($_POST["login"])){
    $email = $_POST["loginemail"];
    $pass = $_POST["loginpass"];
    $select = "SELECT * FROM `sign_table` WHERE `sign_email` = '$email' and `sign_pass` = '$pass'";
    $run = mysqli_query($connect , $select);
    $num_row = mysqli_num_rows($run);
    $fetch = mysqli_fetch_array($run);
    if($num_row != 0){
        if($fetch["is_verifi"] == "1"){
            $_SESSION["email"] = $fetch["sign_email"];
        $_SESSION["name"] = $fetch["sign_name"];
        $_SESSION["v_code"] = $fetch["verifi_code"];

        header("location:web.php");
        }else{
            $msg = "
            <div class='alert alert-danger' role='alert'>
           Regestered Your Email
          </div>
            ";  
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
    <title>Health Care</title>
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <img class="wave_img" src="images/wave.png" alt="">
<div class="main">
    <div class="main_img">
        <img src="images/signin_2.svg" alt="">
    </div>
    <form method="post">
        <div class="form_head">
            <img src="images/avatar (1).svg" alt="">
            <h1>Welcome</h1>
        </div>
        <div class="alert">
            <?php echo$msg;?>
            </div>
<div class="name">
    <label for="name" id="label_2"><i class="fa-solid fa-envelope"></i></label>
    <input type="email" id="input_2" name="loginemail" placeholder="Email" required>
</div>
<div class="name">
    <label for="name" id="label_3"><i class="fa-solid fa-lock"></i></label>
    <input type="password" id="input_3" name="loginpass" placeholder="Password" required>
</div>
<div class="forgot">
    <a href="forgot-pass.php">Forgot Password</a>
</div>
<div class="gosignin">
 <h4>Not have have an account</h4>
<h4><a href="signup.php">Sign Up</a></h4>
</div>
<div class="btn">
    <button type="submit" class="input" name="login">Log In</button>
</div>

    </form>
</div>

<script>

let input_2 = document.getElementById("input_2");
let label_2 = document.getElementById("label_2");
let input_3 = document.getElementById("input_3");
let label_3 = document.getElementById("label_3");

input_2.addEventListener('input', () => {
if (input_2.value.trim() !== '') {  
      label_2.style.color = 'rgb(98,210,162)';
    } else {
      label_2.style.color = 'rgb(233, 233, 233)';

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