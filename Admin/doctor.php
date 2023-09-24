<?php
include("../connection.php");
session_start();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendmail($email, $v_code)
{

    //Load Composer's autoloader
    require '../phpmiller/PHPMailer.php';
    require '../phpmiller/SMTP.php';
    require '../phpmiller/Exception.php';

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
    <a href='http://localhost/health/doctorverifi.php?emailId=$email&v_codeId=$v_code' >Verify</a>    
    </h3>
    ";


        $mail->send();
        return true;
    } catch (Exception $e) {
        echo ("not verify");
    }
}

if (isset($_POST["doctor_btn"])) {
    $name = $_POST["doctor_name"];
    $skill = $_POST["doctor_position"];
    $gmail = $_POST["doctor_gmail"];
    $phone = $_POST["doctor_phone"];
    $location = $_POST["doctor_location"];
    $pass = $_POST["doctor_pass"];

    $doctor_img_type = $_FILES["doctor_fil"]["type"];

    if (strtolower($doctor_img_type) == "image/png" || strtolower($doctor_img_type) == "image/jpg" || strtolower($doctor_img_type) == "image/jpeg") {
        $img_name = $_FILES["doctor_fil"]["name"];
        $target = "img/" . basename($img_name);
        if (move_uploaded_file($_FILES["doctor_fil"]["tmp_name"], $target)) {
            $select = "SELECT * FROM `doctors_table` WHERE `doctor_name` = '$name' OR `doctor_gmail` = '$gmail'";
            $run = mysqli_query($connect, $select);
            if ($run) {
                if (mysqli_num_rows($run) != 0)  #if user have already taken their name or email
                {
                    $result_fetch = mysqli_fetch_array($run);
                    if ($result_fetch["doctor_name"] == $name)   #if user name is already taken
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
                    if (empty($name) || empty($gmail) || empty($pass) || empty($phone) || empty($location) || empty($skill)) {
                        echo "<script>
                alert('Please Fil All the input');
                </script>";
                    } else {
                        $v_code = bin2hex(random_bytes(16));
                        $insert = "INSERT INTO `doctors_table`(`doctor_name`,`doctor_position`,`doctor_gmail`,`doctor_phone`,`doctor_location`,`doctor_pass`,`doctor_img`,`verifi_code`, `is_verifi`) VALUES ('$name','$skill','$gmail','$phone','$location','$pass','$img_name','$v_code','0') ";
                        if (mysqli_query($connect, $insert) && sendmail($gmail, $v_code)) {
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
            <li class="nav-item active">
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
                    <h1 class="h3 mb-2 text-gray-800">Our Doctors Details</h1>
                    <div class="btn_head w-100 d-flex justify-content-end">
                        <button class="btn btn-primary doc_add_btn">Add</button>
                    </div>

                    <!-- DataTales Example -->
                    <table class="table align-middle mb-0 bg-white mt-5">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Phone</th>
                                <th>Start Date</th>
                                <th>Edit / Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select = "SELECT * FROM `doctors_table`";
                            $fire = mysqli_query($connect, $select);
                            while ($data = mysqli_fetch_array($fire)) {
                                if ($data["is_verifi"] == "1") {
                            ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="img/<?php echo $data['doctor_img'] ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1"><?php echo $data['doctor_name'] ?></p>
                                                    <p class="text-muted mb-0"><?php echo $data['doctor_gmail'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1"><?php echo $data['doctor_position'] ?></p>
                                        </td>
                                        <td>
                                            <span class="badge badge-success rounded-pill d-inline"><?php echo $data['doctor_phone'] ?></span>
                                        </td>
                                        <td><?php echo $data['doctor_time'] ?></td>
                                        <td>
                                            <a href="doctor_edit.php?editId=<?php echo $data['doctor_id'] ?>" type="button" class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="doctorprofile.php?profileId=<?php echo $data['doctor_id'] ?>" type="button" class="btn btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="doctor_delete.php?deleteId=<?php echo $data['doctor_id'] ?>" type="button" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                            <?php
                                }
                            }

                            ?>





                        </tbody>
                    </table>
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
    <form class="depart_form w-50" method="post" enctype="multipart/form-data">
        <div class="w-100 d-flex justify-content-end pr-3 pt-3">
            <i class="croos fa-sharp fa-solid fa-xmark"></i>
        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="doctor_name" class="form-control-file" placeholder="Enter Name" id="exampleFormControlFile1">

        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Gmail</label>
            <input type="email" name="doctor_gmail" class="form-control-file" placeholder="Enter Gmail" id="exampleFormControlFile1">

        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Img</label>
            <input type="file" name="doctor_fil" class="form-control-file" placeholder="Post Img" id="exampleFormControlFile1">

        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Skill</label>
            <input type="text" name="doctor_position" class="form-control-file" placeholder="Enter Position" id="exampleFormControlFile1">

        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Location</label>
            <input type="text" name="doctor_location" class="form-control-file" placeholder="Enter Position" id="exampleFormControlFile1">

        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Phone</label>
            <input type="number" name="doctor_phone" class="form-control-file" placeholder="Enter Phone Number" id="exampleFormControlFile1">

        </div>
        <div class="form-group w-75 m-auto pt-4">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="doctor_pass" class="form-control-file" placeholder="Enter Phone Number" id="exampleFormControlFile1">

        </div>

        <div class="btnss w-100 d-flex justify-content-center mb-3 mt-3">
            <button class="btn btn-primary " name="doctor_btn">Submit</button>
        </div>
    </form>


    <script>
        let depart = document.querySelector(".depart_form"),
            croos = document.querySelector(".croos"),
            btnss = document.querySelector(".doc_add_btn");

        btnss.addEventListener("click", function(e) {
            e.preventDefault();
            depart.classList.add("show");
        })
        croos.addEventListener("click", function() {
            depart.classList.remove("show");

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>