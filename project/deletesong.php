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

$sid = mysqli_real_escape_string($conn, $_POST['sid']);
$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);

$sql = "DELETE FROM playlisthassong WHERE sid = '" . $sid . "' AND pid = '" . $pid . "'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: showownplay.php");
exit;
?>
