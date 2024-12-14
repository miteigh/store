<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="assets/css/all.css" rel="stylesheet">
  <link href="assets/css/sb-admin-2.css" rel="stylesheet">
  <link href="assets/css/fontawesome.css" rel="stylesheet">
  <link href="assets/css/brands.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark" data-bs-theme="dark">

  <main>
    <div class="container text-dark">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- <div class="d-flex justify-content-center py-4">
                <div class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block text-light">ระบบรายงานจุดตรวจ</span>
                </div>
              </div> -->
              <!-- End Logo -->

              <div class="card mb-3 shadow h-100 py-2">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 font-weight-bold">ลงชื่อเข้าใช้</h5>
                    <p class="text-center small">ระบบรายงานจุดตรวจ</p>
                  </div>

                  <form class="row g-3 needs-validation" action="signin_db.php" method="post" id="myForm">
                    <?php if (isset($_SESSION['success'])) { ?>
                      <div class="alert alert-success alcenter" role="alert">
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                      </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['error_signin'])) { ?>
                      <div class="alert alert-danger alcenter" role="alert">
                        <!-- <i class="fas fa-exclamation-circle text-danger fa-sm"></i> -->
                        <span class="text-danger small"><?php
                        echo $_SESSION["error_signin"];
                        unset($_SESSION['error_signin']);
                        ?>
                        </span>
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
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">ชื่อผู้ใช้</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="username" class="form-control" id="yourUsername" placeholder="employee_1, manager_1, admin_1" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">รหัสผ่าน</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" placeholder="12345" required>
                      <?php if (isset($_SESSION['error'])) { ?>
                      <div class="" role="alert">
                        <i class="fas fa-exclamation-circle text-danger fa-sm"></i>
                        <span class="text-danger small"><?php
                        echo $_SESSION["error"];
                        unset($_SESSION['error']);
                        ?>
                        </span>
                      </div>
                    <?php } ?>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <!-- <input type="hidden" name="csrf_token" value="<= $_SESSION['csrf_token']; ?>"> -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="signin">ลงชื่อเข้าใช้</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0"><a href="pages-register.html">ลืมรหัสผ่าน</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <script>
    // à¹€à¸¡à¸·à¹ˆà¸­à¸ªà¹ˆà¸‡à¸Ÿà¸­à¸£à¹Œà¸¡ à¸šà¸±à¸™à¸—à¸¶à¸à¸„à¹ˆà¸² username à¹ƒà¸™ sessionStorage
    document.getElementById("myForm").addEventListener("submit", function(event) {
      const username = document.getElementById("yourUsername").value;
      sessionStorage.setItem("username", username);
    });

    // à¸™à¸³à¸„à¹ˆà¸² username à¸ˆà¸²à¸ sessionStorage à¸¡à¸²à¹à¸ªà¸”à¸‡ (à¸–à¹‰à¸²à¸¡à¸µ)
    document.addEventListener("DOMContentLoaded", function() {
      const savedUsername = sessionStorage.getItem("username");
      if (savedUsername) {
        document.getElementById("yourUsername").value = savedUsername;
      }
    });
  </script>

  <script>
    document.getElementById("yourUsername").oninvalid = function() {
      this.setCustomValidity("");
    };

    document.getElementById("yourPassword").oninvalid = function() {
      this.setCustomValidity("ป้อนรหัสผ่าน");
    };

    document.getElementById("yourUsername").oninput = function() {
      this.setCustomValidity("");
    };

    document.getElementById("yourPassword").oninput = function() {
      this.setCustomValidity("");
    };

    function validateForm(event) {
      event.preventDefault();
      console.log("Form submitted successfully.");
    }
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>