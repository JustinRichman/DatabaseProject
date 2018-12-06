<html>
<head>
  <title>Lyrical Masterminds</title>
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
 <center><h2>Playlist Results</h2>
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

       $pid = $_SESSION["pid"];
       $sql = "SELECT title, tags FROM playlist WHERE pid = '" . $pid . "'";
       $result = $conn->query($sql);
       if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
                 echo "<h6><center>Title: " . $row['title']. " - Tags/Genre: " . $row['tags']. "</center></h6>";

        }}
        else{
          echo "0";
        }

       $sql = "SELECT song.artist, playlisthassong.sid, song.stitle FROM playlisthassong, song WHERE playlisthassong.pid = '" . $pid . "' AND playlisthassong.sid = song.sid";

       $result = $conn->query($sql);

       if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
                 echo "<center>ID: " . $row['sid']. " - Artist: " . $row['artist']. " - Song Title: " . $row['stitle']. "</center><br>";

        }}
        else{
          echo "0 results";
        }?>
        <center>
          <?php
            $sql = "SELECT AVG(review.rate) FROM review WHERE pid = $pid";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                      echo "<b><center>Current Rating: " . $row['AVG(review.rate)']. "</center></b>";
             }}
             else{
               echo "<b><center>Current rating: None</center></b>";
             }
           ?>
          <div class="container" style="float:middle">
            <form action="insertrating.php" method="post">
          <input type="text" placeholder="Enter Rating (1-5)" name="rate" required>
          <button type="submit" style="height:60px; width:100px">Rate</button>
        </form></div></center>
        <br>
        <br>
</body>
</html>
