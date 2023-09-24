<?php
include("connection.php");
session_start();

if(isset($_POST['apointbtn'])){
  $name = $_POST['apointname'];
  $phone = $_POST['apointphone'];
  $email = $_POST['apointemail'];
  $message = $_POST['apointmess'];
  $insert = "INSERT INTO `patient_appointment_table`(`patient_name`, `patient_phone`, `patient_email`, `patient_decies`) VALUES ('$name','$phone','$email','$message')";
  $run = mysqli_query($connect , $insert);
  if($run){
    echo"
    <script>
    alert('Submit Successfulley');
    </script>
    ";
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="images/logo-removebg-preview (1).png" type="">

  <title>Health Care</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>

</head>
<style>
  ::selection{
    background: rgb(98,210,162);
    color: #fff;
  }
</style>
<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="web.php">
            <img src="images/logo-removebg-preview (1).png" width="80px" height="80px" alt="">
            <span>
              Health Care
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="web.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="departments.php">Departments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="doctors.php">Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">APPOINTMENT</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                    Quality Healthcare Services
                    </h1>
                    <p>
                    Our commitment to your well-being is unwavering.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                    Expert Medical Team
                    </h1>
                    <p>
                    You can Meet our dedicated team of healthcare professionals.Who Provide you the best health care services,                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      We Provide Best Healthcare
                    </h1>
                    <p>
                      Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

<!-- how it work -->

<section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            How It Work
          </h2>
        </div>

        <div class="row">
          <div class="col-md-3 m-auto">
            <div class="box ">
              <div class="img-box">
                <img src="images/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Step 1: Schedule an Appointment
                </h5>
                <p>
                Start by scheduling an appointment with our healthcare center. You can call us or use our online booking system.
                </p>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 m-auto">
            <div class="box ">
              <div class="img-box">
                <img src="images/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Step 2: Consultation
                </h5>
                <p>
                Meet with one of our experienced doctors or specialists for a comprehensive consultation and examination.
               </p>
              </div>
            </div>
          </div>
          
          <div class="col-md-3 m-auto">
            <div class="box ">
              <div class="img-box">
                <img src="images/s4.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                Step 3: Personalized Treatment
                </h5>
                <p>
                Based on your diagnosis, we create a personalized treatment plan tailored to your health needs and goals.
                </p>
              </div>
            </div>
          </div>
          

        </div>

      </div>
    </div>
  </section>

  <!-- department section -->

  <section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our Departments
          </h2>
          <p>
          Welcome to the heart of our healthcare facility, where expertise meets compassion and innovation leads to exceptional care. Our department is staffed by a dedicated team of professionals who are committed to your well-being. Here, you can learn more about the various departments and services we offer:          </p>
        </div>

        <div class="row">
        <?php
          $select = "SELECT * FROM `depart_table` ";
          $fire = mysqli_query($connect , $select);
          while($data = mysqli_fetch_array($fire)){?>
          <div class="col-md-3 m-auto">
            <div class="box ">
              <div class="img-box">
                <img src="Admin/img/<?php echo $data[3]?>" alt="">
              </div>
              <div class="detail-box">
                <h5>
                <?php echo $data[1]?>
                </h5>
                <p>
                <?php echo $data[2]?>
                </p>
              </div>
            </div>
          </div>
        <?php  
        }
          
          ?>
          
          
        </div>

        <div class="btn-box">
          <a href="">
            View All
          </a>
        </div>
      </div>
    </div>
  </section>

  <section style="width: 100%;margin-bottom:5rem;">

    <div class="container">

    <div class="head">
        <p style="color: rgb(98,210,162);font-weight: bold;">Keep you well</p>
        <h1 style="font-weight: bold;">Latest News</h1>
    </div>
    <?php
$select = "SELECT * FROM `block_table`";
$fire = mysqli_query($connect , $select);
while($data = mysqli_fetch_array($fire)){?>
    <div class="row">
    
      
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
            <div class="card mt-4" style="width: 18rem;margin: auto;">
                <img src="Admin/img/<?php echo $data["b_card1_img"]?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;"><?php echo $data["b_card1_head"]?></h5>
                    <p class="card-text"><?php echo $data["b_card1_text"]?>
                        </p>
                   
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
            <div class="card mt-4" style="width: 18rem;margin: auto;">
                <img src="Admin/img/<?php echo $data["b_card2_img"]?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;"><?php echo $data["b_card2_head"]?></h5>
                    <p class="card-text"><?php echo $data["b_card2_text"]?>
                        </p>
                   
                </div>
            </div>
        </div>
      
        <div class="col-12 col-sm-12 col-md-6 col-lg-4  ">
            <div class="div1 mt-5 pb-3 border-bottom">
            <h3><?php echo $data["b_card3_text1"]?></h3>
            </div>
            <div class="div2 mt-5 pb-3 border-bottom">
              <h3><?php echo $data["b_card3_text2"]?></h3>
              </div>
              <div class="div2 mt-5 pb-3 border-bottom">
                <h3><?php echo $data["b_card3_text3"]?></h3>
                </div>
        </div>
          
   
      
    </div>

<?php
}
?>

          </div>

</section>

  <!-- end department section -->

  <!-- about section -->

  <section class="about_section layout_margin-bottom">
    <div class="container  ">
<?php
$select = "SELECT * FROM `about_table`";
$run = mysqli_query($connect , $select);
while($data = mysqli_fetch_array($run)){?>
<div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="Admin/img/<?php echo $data['about_img']?>" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About <span>Us</span>
              </h2>
            </div>
            <p>
              <?php echo $data['about_name']?>
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
<?php

}


?>
      
    </div>
  </section>

  <!-- end about section -->

  <!-- doctor section -->

  <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Doctors
        </h2>
        <p class="col-md-10 mx-auto px-0">
        At Our Healthcare Center we take pride in having a team of highly skilled and compassionate doctors who are dedicated to your health and well-being. Our diverse group of medical professionals is here to provide you with expert care and personalized attention. Get to know some of our dedicated physicians below:        </p>
      </div>
      <div class="row">
      <?php
        
        $select = "SELECT * FROM `doctors_table`";
        $fire = mysqli_query($connect , $select);
        while($data = mysqli_fetch_array($fire)){?>
         <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="Admin/img/<?php echo $data['doctor_img']?>" alt="">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
                <?php echo $data['doctor_name']?>
              </h5>
              <h6 class="">
              <?php echo $data['doctor_position']?>
              </h6>
            </div>
          </div>
        </div>
      <?php  
      }
        
        ?>
       
      </div>
      <div class="btn-box">
        <a href="">
          View All
        </a>
      </div>
    </div>
  </section>

  <!-- end doctor section -->

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get Appointment
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container contact-form">
            <form method="post">
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="apointname" placeholder="Your Name" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="text" name="apointphone" placeholder="Phone Number" />
                  </div>
                </div>
              </div>
              <div>
                <input type="email" name="apointemail" placeholder="Email" />
              </div>
              <div>
                <input type="text" name="apointmess" class="message-box" placeholder="Deceases" />
              </div>
              <div class="btn_box">
                <button type="submiy" name="apointbtn">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center ">
        <h2>
          Testimonial
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Alan Emerson
                      </h6>
                    </div>
                    <p>
                      Enim consequatur odio assumenda voluptas voluptatibus esse nobis officia. Magnam, aspernatur nostrum explicabo, distinctio laudantium delectus deserunt quia quidem magni corporis earum inventore totam consectetur corrupti! Corrupti, nihil sunt? Natus.
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Alan Emerson
                      </h6>
                    </div>
                    <p>
                      Enim consequatur odio assumenda voluptas voluptatibus esse nobis officia. Magnam, aspernatur nostrum explicabo, distinctio laudantium delectus deserunt quia quidem magni corporis earum inventore totam consectetur corrupti! Corrupti, nihil sunt? Natus.
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Alan Emerson
                      </h6>
                    </div>
                    <p>
                      Enim consequatur odio assumenda voluptas voluptatibus esse nobis officia. Magnam, aspernatur nostrum explicabo, distinctio laudantium delectus deserunt quia quidem magni corporis earum inventore totam consectetur corrupti! Corrupti, nihil sunt? Natus.
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="footer_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <?php
    $select = "SELECT * FROM `about_table` ";
    $run = mysqli_query($connect , $select);
    while($data = mysqli_fetch_array($run)){?>
            <p>
            <?php echo $data['about_name']?>
            </p>
            <?php
    }
            ?>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer_col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="active" href="index.php">
                Home
              </a>
              <a class="" href="about.php">
                About
              </a>
              <a class="" href="departments.php">
                Departments
              </a>
              <a class="" href="doctors.php">
                Doctors
              </a>
              <a class="" href="contact.php">
                DECEASES
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col ">
          <h4>
            Newsletter
          </h4>
          <form action="#">
            <input type="email" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
     
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>