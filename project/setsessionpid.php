<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ptest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);}

session_start();
    $pid = mysqli_real_escape_string($conn, $_POST['pid']);
    $_SESSION['pid'] = $pid;
    header("Location: showownplay.php");
    exit;
 ?>
