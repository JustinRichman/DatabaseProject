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

$sql = "DELETE FROM playlist WHERE pid = '" . $pid . "'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: editplay.php");
exit;
?>
