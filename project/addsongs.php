<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ptest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);
$sid = mysqli_real_escape_string($conn, $_POST["sid"]);
$sql = "INSERT INTO playlisthassong (pid, sid) VALUES ('$pid', '$sid')";
if(mysqli_query($conn, $sql)){
  echo "<center>Records added successfully.</center>";
} else{
  echo "<center>ERROR: Could not able to execute $sql.</center> " . mysqli_error($conn);
}
header("Location: showownplay.php"); // Modify to go to the page you would like
exit;
?>
