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

  $title = $_POST["title"];
  $tags = $_POST["tags"];

  $INtitle = mysqli_real_escape_string($conn, $_POST["title"]);
  $INtags = mysqli_real_escape_string($conn, $_POST["tags"]);

  $id = mysqli_real_escape_string($conn, $_SESSION['id']);

  $sql = "INSERT INTO playlist (title, tags, id) VALUES ('$INtitle', '$INtags', '$id')";
  if(mysqli_query($conn, $sql)){
    echo "<center>Records added successfully.</center>";
  } else{
    echo "<center>ERROR: Could not able to execute $sql.</center> " . mysqli_error($conn);
  }

  $sql = "SELECT pid FROM playlist WHERE title = '" . $INtitle ."' AND tags = '" . $INtags ."' AND id = '" . $id ."'";

   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
           $_SESSION['pid'] = $row['pid'];
     }} else {
     echo "0 results";
   }
  $conn->close();
  header("Location: editplay.php");
  exit;
 ?>
