<html>
<head>
  <title>Browse Playlists</title>
  <link rel="stylesheet" href="main.css">
</head>
<body background = "back.png">
  <form action="homepage.php" method="post">
  <button type="submit" style="height:60px; width:100px">Home</button></form>
  <form action="logout.php" method="post">
  <right><button type="submit" style="height:60px; width:100px">Logout</button>
    <p align="right"> user: <?php
    session_start();
    echo $_SESSION['email'];?></p></form>
  <p></p>
  <center><h2>Select Another Playlist or Select Your Own!</h2></center>
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

    $sql = "SELECT title, tags, pid FROM playlist";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
             echo "<center>ID: " . $row['pid']. " - Playlist Title: " . $row['title']. " - Tags: " . $row['tags']. "<br></center>";
     }}
     else{
       echo "0 results";
     }?>
  <div class="container" style="float:center">
    <form action="setsessionpid2.php" method="post">
      <input type="text" placeholder="Enter Playlist ID: (i.e.: 1)" name="pid" required>
      <center><button type="submit">Select</button><center>
    </form>
  </div>
  <br>
  <br>
 </body>
 </html>
