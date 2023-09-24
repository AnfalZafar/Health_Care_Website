<?php
include("../connection.php");
session_start();

if (isset($_POST["depart-btn"])) {
    $name = $_POST["department_name"];
    $descript = $_POST["department_descript"];
    $img_type = $_FILES["department_fil"]["type"];
    if (strtolower($img_type) == "image/png" || strtolower($img_type) == "image/jpg" || strtolower($img_type) == "image/jpeg") {
        $img_name = $_FILES["department_fil"]["name"];
        $target = "img/" . basename($img_name);
        if (move_uploaded_file($_FILES["department_fil"]["tmp_name"], $target)) {
            $insert = "INSERT INTO `depart_table`(`depart_name`, `depart_descript`, `depart_icon`) VALUES ('$name','$descript','$img_name')";
            $fire = mysqli_query($connect, $insert);
            if ($fire) {
                echo "
    <script>
    alert('Add Successfulley');
    </script>
    ";
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

    <title>Departments</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0962378758.js" crossorigin="anonymous"></script>

</head>
<style>
    .depart_form {
        display: none;
        background: #fff;
        box-shadow: 5px 5px 10px #000;
        border-radius: 5px;
        position: absolute;
        top: 5rem;
        right: 5rem;
    }

    .depart_form.show {
        display: block;
    }

    .croos {
        font-size: 1.3rem;
        cursor: pointer;
    }

    .edit_form {
        display: none;
        background: #fff;
        box-shadow: 5px 5px 10px #000;
        border-radius: 5px;
        position: absolute;
        top: 0;
        right: 0;
        transition: 0.2s ease-in;
    }

    .edit_form.show_2 {
        display: block;
        background: #fff;
        box-shadow: 5px 5px 10px #000;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        right: 2%;
        transform: translate(-50%, -50%);
    }

    .croos2 {
        font-size: 1.3rem;
        cursor: pointer;
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
            <li class="nav-item ">
                <a class="nav-link" href="about.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>About</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            <li class="nav-item active">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["a_name"]?></span>
                                <img class="img-profile rounded-circle" src="img/<?php echo $_SESSION["admin_img"]?>">
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

                    <h1 class="h3 mb-4 text-gray-800">Departments</h1>
                    <div class="btnss w-100 d-flex justify-content-end">
                        <button class="btn btn-primary sub_btn">Add departs</button>
                    </div>



                    <div class="row mt-5">
                        <?php
                        $select = "SELECT * FROM `depart_table`";
                        $run = mysqli_query($connect, $select);
                        while ($data = mysqli_fetch_array($run)) { ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 mt-3">
                                <div class="box " style="  background: #fff;border-radius: 5px;display: flex;align-items: center;justify-content: center;flex-direction: column;">
                                    <div class="img-box" style="background: rgb(73,110,219);border-radius: 50%;overflow:hidden;width: 70px;height: 70px;display: flex;align-items: center;justify-content: center;margin-bottom: 1rem;">
                                        <img src="img/<?php echo $data[3] ?>" style="max-width: 55px;max-height: 55px;" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5 class="pl-3">
                                            <?php echo $data[1] ?>
                                        </h5>
                                        <p>
                                            <?php echo $data[2] ?>

                                        </p>
                                        <div class="btnss w-100 d-flex justify-content-around mb-2">
                                            <a href="depart_update.php?updatedepart=<?php echo $data[0] ?>" class="btn btn-primary">Edit</a>
                                            <a href="depart_delete.php?deletedepart=<?php echo $data[0] ?>" class="btn btn-danger">Delete</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>


                    </div>

                </div>


            </div>

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

    <form method="post" enctype="multipart/form-data" class="depart_form w-50">
        <div class="w-100 d-flex justify-content-end pr-3 pt-3">
            <i class="croos fa-sharp fa-solid fa-xmark"></i>
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="department_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Departments Name">
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Description</label>
            <textarea type="text" name="department_descript" id="" class="w-100 h-25"></textarea>
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleFormControlFile1">Choose Icon</label>
            <input type="file" name="department_fil" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="btnss w-100 d-flex justify-content-center mb-3 mt-3">
            <button type="submit" class="btn btn-primary " name="depart-btn">Submit</button>
        </div>
    </form>

    <!-- <form class="edit_form w-50" method="post" enctype="multipart/form-data">
        <div class="w-100 d-flex justify-content-end pr-3 pt-3">
            <i class="croos fa-sharp fa-solid fa-xmark"></i>
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputEmail1">Edit Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter Departments Name">
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Edit Description</label>
            <textarea name="" id="" class="w-100 h-25"></textarea>
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleFormControlFile1">Edit Icon</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="btnss w-100 d-flex justify-content-center mb-3 mt-3">
            <a class="btn btn-primary ">Submit</a>
        </div>
    </form> -->

    <script>
        let depart = document.querySelector(".depart_form"),
            croos = document.querySelector(".croos"),
            btnss = document.querySelector(".sub_btn");

        btnss.addEventListener("click", function(e) {
            e.preventDefault();
            depart.classList.add("show");
        })
        croos.addEventListener("click", function() {
            depart.classList.remove("show");

        });

        let edit_form = document.querySelector(".edit_form"),
            croos_2 = document.querySelector(".croos2");
        let edit_btn = document.querySelectorAll('.edit_btn');
        for (let i = 0; i < edit_btn.length; i++) {
            let str = edit_btn[i];
            str.addEventListener("click", function() {
                e.preventDefault();
                edit_form.classList.add("show_2");
            })
        }


        croos_2.addEventListener("click", function() {
            edit_form.classList.remove("show_2");

        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>