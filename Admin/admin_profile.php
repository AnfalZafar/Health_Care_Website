<?php
include("../connection.php");

session_start();
// $get = $_GET["profileId"];
// $select = "SELECT * FROM `doctors_table` WHERE `doctors_table`.`doctor_id` = $get";
// $run = mysqli_query($connect, $select);
// $num_rows = mysqli_num_rows($run);
// $fetch = mysqli_fetch_array($run);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>

</head>
<style>
    .depart_form {
        display: none;
        background: #fff;
        box-shadow: 5px 5px 10px #000;
        border-radius: 5px;
        position: absolute;
        top: 0;
        right: 5rem;
    }

    .depart_form.show {
        display: block;
    }

    .croos {
        font-size: 1.3rem;
        cursor: pointer;
    }

    .main {
        width: 100%;
    }

    .img {
        padding-left: 1rem;
        padding-top: 1rem;
    }

    .img img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
    }

    .img input {
        background: transparent;
        color: rgb(15, 15, 15);
        cursor: pointer;
        height: 30px;
        width: 100px;

    }

    .img input::-webkit-file-upload-button {
        background: transparent;
        color: rgb(15, 15, 15);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        border: 2px solid #000;
        height: 100%;
    }

    .img .btn {
        border: 2px solid #000;
        cursor: pointer;
    }

    .prifile {
        margin-top: 2.5rem;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .information {
        width: 100%;
        align-items: center;
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

    .Skills {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 1rem;
    }

    .info_head {
        margin-bottom: 2rem;
    }

    .skill_head {
        margin-bottom: 2rem;
    }

    .info {
        width: 100%;
    }

    .info .name {
        margin-top: 1rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

    }

    .name h5 {
        background: rgb(103, 103, 185);
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        border-radius: 5px;
        color: #fff;
    }

    .skill {
        margin-top: 1rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

    }

    .skill h5 {
        background: rgb(103, 103, 185);
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        border-radius: 5px;
        color: #fff;
    }
    .uploade_btn{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }
    .uploade_btn button{
        width: 120px;
        height: 45px;
        background:rgb(103, 103, 185) ;
        color: #fff;
        border: none;
        font-size: 1.2rem;
    }

    @media(max-width:800px) {
        .prifile {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .skill_head {
            margin-bottom: 1rem;
            margin-top: 2rem;
        }
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
            <li class="nav-item active">
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

            <li class="nav-item">
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["a_name"]?></span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $_SESSION["admin_img"]?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="admin_profile">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
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
                    <h1 class="h3 mb-2 text-gray-800">Your Profile</h1>
                    <form class="main" method="post" enctype="multipart/form-data">
                        <div class="img">
                            <img src="img/<?php echo $_SESSION["admin_img"] ?>" alt="">
                            <input type="file" name="admin_img">
                            <input type="hidden" name="admin_name" value="<?php echo $_SESSION['a_name']?>">

                        </div>
                        <div class="prifile">
                            <div class="information">
                                <div class="info_head">
                                    <h2>Information</h2>
                                </div>
                                <div class="info">
                                    <div class="name">
                                        <h3>Name:</h3>
                                        <h5><?php echo $_SESSION["a_name"] ?></h5>
                                    </div>
                                    <div class="name">
                                        <h3>Email:</h3>
                                        <h5><?php echo $_SESSION["a_email"] ?></h5>
                                    </div>

                                </div>
                            </div>
                            <div class="Skills">
                                <div class="skill_head">
                                    <h2>Contact</h2>
                                </div>
                                <div class="skill">
                                    <h3>Location:</h3>
                                    <h5><?php echo $_SESSION["a_email"] ?></h5>
                                </div>
                                <div class="skill">
                                    <h3>Phone Number:</h3>
                                    <h5><?php echo $_SESSION["a_email"] ?></h5>
                                </div>
                            </div>
                           
                        </div>
                        <div class="uploade_btn">
                                <button type="submit" name="uploade">upload</button>
                            </div>
                    </form>
<?php
if(isset($_POST["uploade"])){
$name = $_POST["admin_name"];
$img_type = $_FILES["admin_img"]["type"];
$img_name = $_FILES["admin_img"]["name"];
$img_tmp = $_FILES["admin_img"]["tmp_name"];
$target = "img/" .basename($img_name);
if(strtolower($img_type) == "image/png" || strtolower($img_type) == "image/jpg" || strtolower($img_type) == "image/jpeg" ){
    if(move_uploaded_file($img_tmp , $target)){
        $update = "UPDATE `ad` SET `admin_img`='$img_name'WHERE `admin_name` = '$name' ";
        $fire = mysqli_query($connect , $update);
        if($fire){
            header("location:index.php");
        }
    }
}else{
    echo"<script>
    alert('Select img in PNG , JPG and JPEG');
    </script>"; 
}
}

?>

                    <!-- DataTales Example -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- End of Footer -->

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
    <!-- add doctors -->
    <script>
        $("#files").change(function() {
            filename = this.files[0].name;
            console.log(filename);
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>