<html>
<head>
  <title>Lyrical Masterminds</title>
  <link rel="stylesheet" href="main.css">
</head>
<body background = "back.png">
  <p> </p>
  <form action="homepage.php" method="post">
  <button type="submit" style="height:60px; width:100px">Home</button></form>
  <form action="logout.php" method="post">
  <right><button type="submit" style="height:60px; width:100px">Logout</button>
    <p align="right"> user: <?php
    session_start();
    echo $_SESSION['email'];?></p></form>
  <center><h2>Search Results</h2></center>
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

  $artistname = $_POST["artistname"];

  $INaname = mysqli_real_escape_string($conn, $_POST['artistname']);

  $sql = "SELECT artist, stitle, sid FROM song WHERE artist LIKE '$INaname%'";

  $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          echo "<center>ID: " . $row['sid']. " - Artist: " . $row['artist']. " - Song Title: " . $row['stitle']. "</center><br>";
}} else {
    echo "<center>0 results</center>";
}?>
<div class="container" style="float:center">
  <form action="addsongs.php" method="post">
    <center><input type="text" placeholder="Enter Song ID (i.e.: 1)" name="sid">
    <input type="submit" name="submit" value="Submit" style="height:75px; width:200px"/></center>
  </form>
  <form action="artistsearchform.php" method="post">
    <center><input type="submit" name="submit" value="Return" style="height:75px; width:170px"/></center><center>
  </form>
</div>
<br>
<br>
</body>
</html>
