<?php
include("../connection.php");

if(isset($_POST["card_submit"])){
    $card1_text = $_POST["card1_text"];
    $card2_text = $_POST["card2_text"];
    $card_img_type = $_FILES["card1_img"]["type"];
    $card2_img_type = $_FILES["card2_img"]["type"];
    if(strtolower($card_img_type) == "image/png" && strtotime($card2_img_type) == "image/png" ||strtolower($card_img_type) == "image/jpg" && strtotime($card2_img_type) == "image/jpg" ||strtolower($card_img_type) == "image/jpeg" && strtotime($card2_img_type) == "image/jpeg" ) {
    $card1_img = $_FILES["card1_img"]["name"];
    $card2_img = $_FILES["card2_img"]["name"];
    $target = "img/" .basename($card1_img,$card2_img);
    if(move_uploaded_file($_FILES["card1_img"]["tmp_name"] , $_FILES["card2_img"]["tmp_name"])){
        $insert = "INSERT INTO `block_table`(`b_card1_text`, `b_card1_img`, `b_card2_text`, `b_card2_img`) VALUES ('$card1_text','$card1_img','$card2_text','$card2_img')";
        $run = mysqli_query($connect , $insert);
        if($run){
            echo "
            <script>
            alert('Add Success fulley');
            </script>";
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
    <title>Document</title>
</head>
<body>
    



<form method="post" enctype="multipart/form-data">


<input type="text" name="card1_text">
<input type="file" name="card1_img" id="">
<input type="file" name="card2_img" id="">
<input type="text" name="card2_text">



<button name="card_submit">submit</button>

</form>





</body>
</html>