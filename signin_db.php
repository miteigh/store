<?php

require_once("config.php");
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true,
    'use_strict_mode' => true
]);    

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) && $_POST['remember'] === 'true';
    // สร้าง Token ที่ปลอดภัย
    $token = bin2hex(random_bytes(16)); // สุ่ม Token
  
    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
        header("location: signin.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';  
        header("location: signin.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: signin.php");
    } else {
        try {

            $check_data = $conn->prepare("SELECT * FROM employees WHERE username = :username");
            $check_data->bindParam(":username", $username);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {

                if ($username == $row['username']) {
                    if (password_verify($password, $row['password'])) {
                        // ตรวจสอบว่า user เลือก "Remember Me" หรือไม่
                        if ($remember) {
                            // ตั้งค่าคุกกี้เพื่อจดจำผู้ใช้
                            setcookie("username", $username, time() + (86400 * 5), "/"); // คุกกี้จะหมดอายุใน 30 วัน
                            setcookie("user_id", $row['id'], time() + (86400 * 5), "/");
                            // เก็บ Token ใน Cookie
                            setcookie("remember_token", $token, time() + (86400 * 30), "/");

                            // บันทึก Token ในฐานข้อมูล
                            $stmt = $conn->prepare("UPDATE employees SET remember_token = :token WHERE username = :username");
                            $stmt->bindParam(":token", $token);
                            $stmt->bindParam(":username", $username);
                            $stmt->execute();
                            
                        }
                        
                        if ($row['position'] == 'admin') {
                            $_SESSION['admin_login'] = $row['id'];
                            header("location: admin.php");
                            exit();
                        } else if ($row['position'] == 'manager') {
                            $_SESSION['manager_login'] = $row['id'];
                            header("location: manager.php");
                            exit();
                        } else if ($row['position'] == 'employee') {
                            $_SESSION['employee_login'] = $row['id'];
                            header("location: employee.php");
                            exit();
                        }
                        exit();
                    } else {
                        $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง ลองอีกครั้งหรือคลิก ลืมรหัสผ่าน เพื่อรีเซ็ตรหัส';
                        header("location: signin.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = 'ชื่อผู้ใช้ผิด';
                    header("location: signin.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                header("location: signin.php");
                exit();
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

if (isset($_POST['signup'])) {
    $employeeid = $_POST['employee_id'] ;
    $pname = $_POST['pname'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $position = $_POST['position'];
    $address1 = $_POST['address1'];
    $postalcode = $_POST['postalcode'];
    $username = $_POST['employee_id'];
    $password = '12345678';
    $create_by = $_SESSION['manager_login'];

    if (empty($employeeid)) {
        $_SESSION['error_creat'] = 'กรุณากรอกรหัสพนักงาน';
        header("location: manager.php");
        exit();
    } else if (empty($pname)) {
        $_SESSION['error_creat'] = 'กรุณากรอกคำนำหน้า';
        header("location: manager.php");
        exit();
    } else if (empty($firstname)) {
        $_SESSION['error_creat'] = 'กรุณากรอกชื่อ';
        header("location: manager.php");
        exit();
    } else if (empty($lastname)) {
        $_SESSION['error_creat'] = 'กรุณากรอกนามสกุล';
        header("location: manager.php");
        exit();
    } else if (empty($email)) {
        $_SESSION['error_creat'] = 'กรุณากรอกอีเมล';
        header("location: manager.php");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_creat'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: manager.php");
        exit();
    } else if (empty($tel)) {
        $_SESSION['error_creat'] = 'กรุณากรอกเบอร์โทร';
        header("location: manager.php");
        exit();
    } else if (empty($position)) {
        $_SESSION['error_creat'] = 'กรุณากรอกตำแหน่งพนักงาน';
        header("location: manager.php");
        exit();
    } else {
        try {
            $check_email = $conn->prepare("SELECT username FROM employees WHERE username = :username");
            $check_email->bindParam(":username", $username);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if (empty($dob)) {
                $dob = null;
            }

            if ($row['username'] == $username) {
                $_SESSION['warnin_creat'] = "มีรหัสพนักงานนี้อยู่ในระบบแล้ว <a href='manager.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: manager.php");
            } else if (!isset($_SESSION['error_creat'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO employees (employee_id, pname, firstname, lastname, tel, email, position, dob, postalcode, username, password, update_at, create_by) 
                                        VALUES(:employeeid, :pname, :firstname, :lastname, :tel, :email, :position, :dob, :postalcode, :username, :password, NOW(), :create_by)");
                $stmt->bindParam(":employeeid", $employeeid);
                $stmt->bindParam(":pname", $pname);
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":tel", $tel);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":position", $position);
                $stmt->bindParam(":dob", $dob);
                $stmt->bindParam(":postalcode", $postalcode);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":create_by", $create_by);
                $stmt->execute();
                $_SESSION['success_creat'] = "เพิ่มข้อมูลพนักงานเรียบร้อยแล้ว!"; //<a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ"
                header("location: manager.php");
                exit();
            } else {
                $_SESSION['error_creat'] = "มีบางอย่างผิดพลาด";
                header("location: manager.php");
                exit();
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
?>