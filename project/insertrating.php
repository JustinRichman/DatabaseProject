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

echo $_POST['rate'];
$rate = mysqli_real_escape_string($conn, $_POST['rate']);
$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);
$id = mysqli_real_escape_string($conn, $_SESSION['id']);
$sql = "INSERT INTO review (rate, pid, id) VALUES ('$rate', '$pid', '$id')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: listplay.php");
exit;
?>
