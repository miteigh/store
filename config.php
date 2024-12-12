<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mighty_db";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

<?php
// $host = "localhost";
// $user = "root";
// $pwd = "";
// $dbName = "mighty_db";
// //-----
// $conn = new mysqli($host, $user, $pwd, $dbName);
// if ($conn->connect_errno) {
//     printf("Connect failed: %s\n", $conn->connect_error);
//     exit();
// }
// if (!$conn->set_charset("utf8")) {
//     printf("Error loading character set utf8: %s\n", $conn->error);
//     exit();
// }
?>