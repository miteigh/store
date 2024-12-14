<?php
require_once "config.php";
session_start();
if (!isset($_SESSION['manager_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
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

    <title>ข้อมูลพนักงาน</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
    if (isset($_SESSION['manager_login'])) {
        $manager_id = $_SESSION['manager_login'];
        $stmt = $conn->query("SELECT * FROM employees WHERE id = $manager_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark-50 sidebar sidebar-dark accordion border-right border-dark" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Employee <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>รายงาน</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">รายงาน:</h6>
                        <a class="collapse-item" href="newindex.html">จุดตรวจ</a>
                        <a class="collapse-item" href="incident-report.html">แจ้งเหตุ</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>เครื่องมือ</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">เครื่องมือ:</h6>
                        <a class="collapse-item" href="subject.php">จัดการรายวิชา</a>
                        <a class="collapse-item" href="register.php">ลงทะเบียน</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.php">Login</a>
                        <a class="collapse-item" href="register.php">Register</a>
                        <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="bg-dark-50">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark-50 topbar mb-4 static-top shadow border-bottom border-dark">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link text-white d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">ธันวาคม 12, 2024</div>
                                        <span class="font-weight-bold">มีการแจ้งเหตุการณ์ใหม่!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                    echo $row['firstname'];
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-100">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->

                    <div class="row justify-content-center">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4 bg-dark border-0">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-dark border-0">
                                    <h6 class="m-0 font-weight-bold text-white-25">ข้อมูลพนักงาน</h6>
                                    <?php if (isset($_SESSION['error_creat'])) { ?>
                                        <div class="alert alert-danger alcenter" role="alert">
                                            <?php
                                            echo $_SESSION['error_creat'];
                                            unset($_SESSION['error_creat']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['success_creat'])) { ?>
                                        <div class="alert alert-success alcenter" role="alert">
                                            <?php
                                            echo $_SESSION['success_creat'];
                                            unset($_SESSION['success_creat']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['warning_creat'])) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php
                                            echo $_SESSION['warning_creat'];
                                            unset($_SESSION['warning_creat']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <div>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addemployeeModal">
                                                <i class="bi bi-person-plus-fill"></i>
                                                <span class="mr-2 d-none d-lg-inline">เพิ่มข้อมูลพนักงาน</span>
                                            </button>
                                            <button type="button" class="btn btn-danger ml-1" id="bulkDeleteButton" onclick="confirmBulkDelete()">
                                                <i class="fas fa-trash fa-sm"></i>
                                                <span class="mr-2 d-none d-lg-inline">ลบที่เลือก</span>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="addemployeeModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-dark-50">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">เพิ่มข้อมูลพนักงาน</h1>
                                                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="signin_db.php">
                                                                <div class="mb-3">
                                                                    <label for="recipient-name" class="col-form-label text-white">รหัสพนักงาน:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="recipient-name" name="employee_id" require>
                                                                    <!-- ฟอร์มสำหรับพิมพ์คณะใหม่ -->
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="newFaculty" class="col-form-label text-white">คำนำหน้า:</label>
                                                                    <select name="pname" id="" class="custom-select bg-dark-50 text-white">
                                                                        <option selected disabled>เลือกคำนำหน้า</option>
                                                                        <option value="นาย">นาย</option>
                                                                        <option value="นาง">นาง</option>
                                                                        <option value="นางสาว">นางสาว</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="newFaculty" class="col-form-label text-white">ชื่อ:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="newfirstname" name="firstname" require>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">นามสกุล:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="message-text" name="lastname" require>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">เบอร์โทรศัพท์:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="message-text" name="tel" require>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">อีเมล:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="message-text" name="email">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">ตำแหน่ง:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="message-text" name="position" require>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">วัน/เดือน/ปีเกิด:</label>
                                                                    <input type="date" class="form-control bg-dark-50 text-white" id="message-text" name="dob">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">ที่อยู่ไปรษณีย์:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="message-text" name="postalcode">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="message-text" class="col-form-label text-white">ที่อยู่:</label>
                                                                    <input type="text" class="form-control bg-dark-50 text-white" id="message-text" name="address1">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                                    <button type="submit" class="btn btn-primary" name="signup">บันทึกข้อมูล</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">ยืนยันการลบ</h5>
                                                            <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            คุณแน่ใจหรือไม่ว่าต้องการลบ<?php echo $row['mid']; ?>ข้อมูลที่เลือก?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                            <button type="submit" class="btn btn-danger" data-dismiss="modal" form="bulkActionForm">ยืนยัน</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDeletee" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteLabel">กรุณาเลือกข้อมูลที่ต้องการลบ!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteLabel">ยืนยันการลบข้อมูล</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลที่เลือก?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">ยืนยันการลบ</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <script>
                                    function toggleInputField(select) {
                                        // ตรวจสอบว่าเลือกตัวเลือก "อื่นๆ" หรือไม่
                                        var inputField = document.getElementById('new-faculty-input');
                                        if (select.value === 'other') {
                                            inputField.style.display = 'block'; // แสดงช่องพิมพ์
                                        } else {
                                            inputField.style.display = 'none'; // ซ่อนช่องพิมพ์
                                        }
                                    }
                                </script>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="alert alert-danger alcenter" role="alert">
                                            <?php
                                            echo $_SESSION['error'];
                                            unset($_SESSION['error']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['success'])) { ?>
                                        <div class="alert alert-success alcenter" role="alert">
                                            <?php
                                            echo $_SESSION['success'];
                                            unset($_SESSION['success']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['warning'])) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php
                                            echo $_SESSION['warning'];
                                            unset($_SESSION['warning']);
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <!-- DataTales Example -->
                                    <div class="table-responsive text-white">
                                        <table class="table table-bordered border-dark-50 text-gray-200" id="dataTable" width="100%" cellspacing="0">
                                            <?php
                                            // ดึงข้อมูลจากตาราง db_faculty และ db_major ที่เชื่อมโยงกันผ่าน FID
                                            $sql = "SELECT * FROM employees";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->execute();
                                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="selectAll"></th>
                                                    <th>รหัสพนักงาน</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>เบอร์โทร</th>
                                                    <th>email</th>
                                                    <th>ตำแหน่ง</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="checkbox" id="selectAllFooter"></th>
                                                    <th>รหัสพนักงาน</th>
                                                    <th>ชื่อ</th>
                                                    <th>นามสกุล</th>
                                                    <th>เบอร์โทร</th>
                                                    <th>email</th>
                                                    <th>ตำแหน่ง</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                // แสดงผลข้อมูลที่ดึงมาจาก JOIN
                                                foreach ($results as $row) {
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" class="rowCheckbox" name="mid[]" value="<?php echo $row['id']; ?>"></td>
                                                        <td><?php echo $row['employee_id']; ?></td>
                                                        <td><?php echo $row['firstname']; ?></td>
                                                        <td><?php echo $row['lastname']; ?></td>
                                                        <td><?php echo $row['tel']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['position']; ?></td>
                                                        <td>
                                                            <button type="submit" class="btn btn-warning btn-sm text-gray-900"
                                                                onclick="openEditModal('<?php echo $row['id']; ?>', 
                                                                                    '<?php echo $row['firstname']; ?>', 
                                                                                    '<?php echo $row['lastname']; ?>', 
                                                                                    '<?php echo $row['tel']; ?>', 
                                                                                    '<?php echo $row['email']; ?>')">
                                                                แก้ไข
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <!-- ปุ่มลบ -->
                                                            <!-- <form action="delete.php" method="POST" style="display:inline;"> -->
                                                            <!-- <input type="hidden" name="mid" value="<?php echo $row['mid']; ?>"> -->
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $row['id']; ?>')">ลบ</button>
                                                            <!-- </form> -->
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">แก้ไขข้อมูล</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form id="editForm" action="update.php" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" id="editid" name="id"> <!-- ซ่อนค่า MID -->
                                                            <div class="mb-3">
                                                                <label for="editFname" class="form-label">ชื่อ</label>
                                                                <input type="text" class="form-control" id="editfirstname" name="firstname" value="" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editMname" class="form-label">นามสกุล</label>
                                                                <input type="text" class="form-control" id="editlastname" name="lastname" value="" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editStatus" class="form-label">เบอร์โทร</label>
                                                                <input type="text" class="form-control" id="edittel" name="tel" value="" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editStatus" class="form-label">อีเมล</label>
                                                                <input type="text" class="form-control" id="editemail" name="email" value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                            <button type="sbmit" class="btn btn-primary" name="savechanges">บันทึกการเปลี่ยนแปลง</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- End Modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">ยืนยันการลบ</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้?
                                                        <input type="hidden" id="deleteMid"> <!-- ฟิลด์ซ่อนสำหรับเก็บ MID -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                        <button type="button" class="btn btn-danger" onclick="deleteMajor()">ยืนยัน</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                        <script>
                                            document.getElementById('selectAll').addEventListener('change', function() {
                                                const checkboxes = document.querySelectorAll('.rowCheckbox');
                                                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                                            });
                                            document.getElementById('selectAllFooter').addEventListener('change', function() {
                                                const checkboxes = document.querySelectorAll('.rowCheckbox');
                                                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                                            });
                                            // document.getElementById('bulkDeleteButton').addEventListener('click', function() {
                                            //     const selected = document.querySelectorAll('input[name="ids[]"]:checked');
                                            //     if (selected.length > 0) {
                                            //         const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                                            //         deleteModal.show();
                                            //     } else {
                                            //         alert("Please select at least one item to delete.");
                                            //     }
                                            // });

                                            function confirmDelete(mid) {
                                                // เก็บค่า MID ใน input ซ่อน
                                                document.getElementById('deleteMid').value = mid;
                                                // เปิด Modal
                                                $('#confirmDeleteModal').modal('show');
                                            }

                                            function openEditModal(id, firstname, lastname, tel, email) {
                                                // เติมข้อมูลลงในฟอร์มของ Modal
                                                document.getElementById('editid').value = id;
                                                document.getElementById('editfirstname').value = firstname;
                                                document.getElementById('editlastname').value = lastname;
                                                document.getElementById('edittel').value = tel;
                                                document.getElementById('editemail').value = email;

                                                // เปิด Modal
                                                $('#editModal').modal('show');
                                            }

                                            function deleteMajor() {
                                                var mid = document.getElementById('deleteMid').value; // ดึงค่า MID จาก input ซ่อน

                                                // ส่งคำขอ AJAX ไปยังเซิร์ฟเวอร์เพื่อลบข้อมูล
                                                $.ajax({
                                                    url: 'delete.php',
                                                    type: 'POST',
                                                    data: {
                                                        mid: mid
                                                    },
                                                    success: function(response) {
                                                        //     alert('ลบข้อมูลสำเร็จ!');
                                                        location.reload(); // รีเฟรชหน้าเว็บ
                                                    },
                                                    error: function() {
                                                        alert('เกิดข้อผิดพลาดในการลบข้อมูล');
                                                    }
                                                });
                                            }

                                            function confirmBulkDelete() {
                                                var selected = [];
                                                document.querySelectorAll('.rowCheckbox:checked').forEach(function(checkbox) {
                                                    selected.push(checkbox.value);
                                                }); // ดึงค่า MID จาก input ซ่อน

                                                if (selected.length === 0) {
                                                    $('#confirmDeletee').modal('show'); // แสดง modal เมื่อไม่มีการเลือกข้อมูล
                                                    return;
                                                }

                                                // หากมีการเลือกข้อมูลให้ทำการยืนยันการลบ
                                                $('#confirmDelete').modal('show'); // แสดง modal ยืนยัน
                                                $('#confirmDeleteButton').off('click').on('click', function() {
                                                    // เมื่อกด "ยืนยันการลบ" ให้ทำการลบข้อมูล
                                                    $.ajax({
                                                        url: 'delete.php',
                                                        type: 'POST',
                                                        data: {
                                                            mids: selected
                                                        },
                                                        success: function(response) {
                                                            alert('ลบข้อมูลสำเร็จ!');
                                                            location.reload(); // รีเฟรชหน้าเว็บ
                                                        },
                                                        error: function() {
                                                            alert('เกิดข้อผิดพลาดในการลบข้อมูล');
                                                        }
                                                    });
                                                    $('#confirmDelete').modal('hide'); // ซ่อน modal หลังจากทำการลบ
                                                });
                                            }

                                            // function confirmBulkDelete() {
                                            //     var selected = [];
                                            //     document.querySelectorAll('.rowCheckbox:checked').forEach(function(checkbox) {
                                            //         selected.push(checkbox.value);
                                            //     });

                                            //     if (selected.length === 0) {
                                            //         $('#confirmDelete').modal('show');
                                            //         return;
                                            //     }

                                            //     if (confirm('คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลที่เลือก?')) {
                                            //         $.ajax({
                                            //             url: 'delete.php',
                                            //             type: 'POST',
                                            //             data: {
                                            //                 mids: selected
                                            //             },
                                            //             success: function() {
                                            //                 alert('ลบข้อมูลสำเร็จ!');
                                            //                 location.reload();
                                            //             },
                                            //             error: function() {
                                            //                 alert('เกิดข้อผิดพลาดในการลบข้อมูล');
                                            //             }
                                            //         });
                                            //     }
                                            // }
                                        </script>

                                    </div>
                                    <!-- End DataTables Example -->

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-dark-50 border-top border-dark">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <form method="POST" action="logout.php">
                        <input type="hidden" name="role" value="manager">
                        <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                    </form>
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                    <?php if (isset($_SESSION['manager_login'])) : ?>
                        <!-- <a class="btn btn-primary" href="logout.php?logout='1'">Logout</a> -->
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.js"></script>
    <script src="assets/js/addon.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="assets/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
</body>

</html>