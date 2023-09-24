<?php
include("../connection.php");
session_start();

if (isset($_POST["card_submit"])) {
    $card1_head = $_POST["card1_head"];
    $card1_text = $_POST["card1_text"];
    $card2_head = $_POST["card2_head"];
    $card2_text = $_POST["card2_text"];
    $card3_text1 = $_POST["card3_text1"];
    $card3_text2 = $_POST["card3_text2"];
    $card3_text3 = $_POST["card3_text3"];
    $card_img_type = $_FILES["card1_img"]["type"];
    $card2_img_type = $_FILES["card2_img"]["type"];


    if (strtolower($card_img_type) && ($card2_img_type) == "image/png" || strtolower($card_img_type) && ($card2_img_type) == "image/jpg" || strtolower($card_img_type) && ($card2_img_type) == "image/jpeg") {
        $card1_img = $_FILES["card1_img"]["name"];
        $card2_img = $_FILES["card2_img"]["name"];
        $target = "img/"  .basename($card1_img);
        $target2 = "img/" .basename($card2_img);
        if (move_uploaded_file($_FILES["card1_img"]["tmp_name"], $target) && move_uploaded_file($_FILES["card2_img"]["tmp_name"], $target2)) {
            $insert = "INSERT INTO `block_table`(`b_card1_head`, `b_card1_text`, `b_card1_img` , `b_card2_head`, `b_card2_text`,`b_card2_img`, `b_card3_text1`, `b_card3_text2`, `b_card3_text3`) VALUES ('$card1_head','$card1_text','$card1_img','$card2_head','$card2_text','$card2_img','$card3_text1','$card3_text2','$card3_text3')";
            $run = mysqli_query($connect, $insert);
            if ($run) {
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Block</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>

</head>
<style>
    .block_card {
        display: none;
        overflow: hidden;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .block_card.show_block {
        display: block;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #000;
        color: #fff;
    }

    .croos {
        font-size: 1.2rem;
        cursor: pointer;
    }

    .depart_form {
        display: none;

    }

    .depart_form.show_depart {
        display: block;
    }

    .depart_form2 {
        display: none;
    }

    .depart_form2.show_depart2 {
        display: block;
    }

    .depart_form3 {
        display: none;
    }

    .depart_form3.show_depart3 {
        display: block;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../images/logo-removebg-preview (1).png" width="80px" height="80px" alt="">
                </div>
                <div class="sidebar-brand-text">Heath Care</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="doctor.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Doctors Detail</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Patient</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="patient-detail.php">Patient Detail</a>
                        <a class="collapse-item" href="patient-appoint.php">Patient Appointment</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Settings
            </div>
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>About</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="depart.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Departments</span></a>
            </li>

            <!-- Nav Item - Tables -->

            <li class="nav-item active">
                <a class="nav-link" href="block.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Block</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["a_name"] ?></span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $_SESSION["admin_img"] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 style="font-weight: bold;">Latest News</h1>
                    <div class="btnss w-100 d-flex justify-content-end">
                        <button class="btn btn-primary sub_btn">Add</button>

                    </div>

                    <section style="width: 100%;margin-bottom:5rem;">
<?php
$select = "SELECT * FROM `block_table`";
$fire = mysqli_query($connect , $select);
while($data = mysqli_fetch_array($fire)){?>
   <div class="container">

<div class="row d-flex justify-content-center">


    <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
        <div class="card mt-4" style="width: 18rem;margin: auto;">
            <img src="img/<?php echo $data["b_card1_img"]?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold;"><?php echo $data["b_card1_head"]?></h5>
                <p class="card-text"><?php echo $data["b_card1_text"]?>
                </p>

            </div>
        </div>
    </div>
 
    <div class="col-12 col-sm-12 col-md-6 col-lg-4 ">
        <div class="card mt-4" style="width: 18rem;margin: auto;">
            <img src="img/<?php echo $data["b_card2_img"]?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold;"><?php echo $data["b_card2_head"]?></h5>
                <p class="card-text"><?php echo $data["b_card2_text"]?>
                </p>

            </div>
        </div>
    </div>
 




</div>
<div class="row m-auto d-flex justify-content-center">
    <div class="col-12 col-sm-12 col-md-6 col-lg-4 display-flex aline-item-center">
        <div class="div1 mt-5 pb-3 border-bottom ">
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


</div>
<?php
}
?>
                     

                    </section>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- add about -->

    <form class="block_card w-50 m-auto" method="post" enctype="multipart/form-data">
        <div class="w-100 d-flex justify-content-end pr-3 pt-3">
            <i class="croos fa-sharp fa-solid fa-xmark"></i>
        </div>
        <div class="depart_form w-100">
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card1 Head</label>
                <textarea id="" class="w-100 h-50" name="card1_head" required></textarea>
            </div>
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card1 Text</label>
                <textarea id="" class="w-100 h-50" name="card1_text" required></textarea>
            </div>
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleFormControlFile1">Choose Img</label>
                <input type="file" class="form-control-file" name="card1_img" id="exampleFormControlFile1" required>
            </div>
            <div class="btnss w-100 d-flex justify-content-center mb-3 mt-3">
                <button class="next_1 btn-primary " name="">Next</button>
            </div>

        </div>

        <div class="depart_form2 w-100">

            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card2 Head</label>
                <textarea name="card2_head" id="" class="w-100 h-50" required></textarea>
            </div>
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card2 Text</label>
                <textarea name="card2_text" id="" class="w-100 h-50" required></textarea>
            </div>
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleFormControlFile1">Choose Img</label>
                <input type="file" name="card2_img" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
            <div class="div3 w-100 mt-3 mb-3">
                <div class="btnss w-50 d-flex justify-content-between m-auto" style="margin-top: 2rem;margin: bottom 2rem;">
                    <button class="btn_2 btn-primary " name="">Back</button>
                    <button class="next_2 btn-primary " name="">Next</button>
                </div>
            </div>
        </div>

        <div class="depart_form3 w-100">

            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card3 Text</label>
                <textarea name="card3_text1" id="" class="w-100 h-50" required></textarea>
            </div>
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card3 Text</label>
                <textarea name="card3_text2" id="" class="w-100 h-50" required></textarea>
            </div>
            <div class="form-group w-75 m-auto pt-4">
                <label for="exampleInputPassword1">Card3 Text</label>
                <textarea name="card3_text3" id="" class="w-100 h-50" required></textarea>
            </div>
            <div class="div2 w-100 mt-3 mb-3">
                <div class="btnss w-50 d-flex justify-content-between m-auto mb-5 mt-5">
                    <button class="btn_3 btn-primary " name="">Back</button>
                    <button class="btn-primary " name="card_submit">Submit</button>
                </div>
            </div>
        </div>

    </form>



    <!-- edit about -->

    <script>
        let depart = document.querySelector(".depart_form"),
            croos = document.querySelector(".croos"),
            block_card = document.querySelector(".block_card"),
            btnss = document.querySelector(".sub_btn"),
            btn_2 = document.querySelector(".btn_2"),
            depart_form2 = document.querySelector(".depart_form2"),
            next_1 = document.querySelector(".next_1"),
            depart_form3 = document.querySelector(".depart_form3"),
            next_2 = document.querySelector(".next_2"),
            btn_3 = document.querySelector(".btn_3");


        btnss.addEventListener("click", function() {
            block_card.classList.add("show_block");
            depart.classList.add("show_depart");
        });
        croos.addEventListener("click", function() {
            block_card.classList.remove("show_block");
            depart.classList.remove("show_depart");
        });
        next_1.addEventListener("click", function(e) {
            e.preventDefault();
            block_card.classList.add("show_block");
            depart_form2.classList.add("show_depart2")
            depart.classList.remove("show_depart");
        });
        btn_2.addEventListener("click", function(e) {
            e.preventDefault();
            block_card.classList.add("show_block");
            depart.classList.add("show_depart");
            depart_form2.classList.remove("show_depart2");
        });
        next_2.addEventListener("click", function(e) {
            e.preventDefault();
            block_card.classList.add("show_block");
            depart_form3.classList.add("show_depart3");
            depart.classList.remove("show_depart");
            depart_form2.classList.remove("show_depart2");
        });
        btn_3.addEventListener("click", function(e) {
            e.preventDefault();
            block_card.classList.add("show_block");
            depart_form2.classList.add("show_depart2");
            depart.classList.remove("show_depart");
            depart_form3.classList.remove("show_depart3");
        });
    </script>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>