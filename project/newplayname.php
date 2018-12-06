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
  $new = mysqli_real_escape_string($conn, $_POST['new']);
  $pid = mysqli_real_escape_string($conn, $_SESSION['pid']);
  $sql = "UPDATE playlist SET title = '" . $new . "'  WHERE pid = '" . $_SESSION['pid'] . "'";
  $result = $conn->query($sql);
  if(mysqli_query($conn, $sql)){
    echo "<center>Records updated successfully.</center>";
  } else{
    echo "<center>ERROR: Could not able to execute $sql.</center> " . mysqli_error($conn);
  }
//header("Location: editplay.php");
//exit;
?>
